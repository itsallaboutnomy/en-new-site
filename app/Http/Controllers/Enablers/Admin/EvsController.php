<?php

namespace App\Http\Controllers\Enablers\Admin;

use App\Models\User;
use App\Mail\EVSUserStatusMail;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EvsController extends Controller
{
    protected $user, $viewPrefix, $routePrefix;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->routePrefix = 'evs-users.';
        $this->viewPrefix = 'enablers.admin.evs-users.';
    }

    public function index()
    {
        return view($this->viewPrefix.'index');
    }

    public function evsData(Request $request)
    {
        $evsUser = $this->user
            ->whereIn('type',['evs-visitor','evs-user','evs-rejected',]);

        return Datatables::of($evsUser)
            ->addColumn('created_at', function ($model) {
                return date('d M, Y g:i A',strtotime($model->created_at)) ;
            })
            ->addColumn('status', function ($model) {
                $status = [
                    'evs-user' => 'Approved',
                    'evs-rejected' => 'Rejected',
                    'evs-visitor' => 'Pending',
                ];
                $statusColor = [
                    'evs-user' => 'text-success',
                    'evs-rejected' => 'text-danger',
                    'evs-visitor' => 'text-blue',
                ];

                return '<a class="'.$statusColor[$model->type].' text-bold">'.$status[$model->type].'</a>';
            })
            ->addColumn('action', function ($model) {
                return '<a href="'.route($this->routePrefix.'show',$model->id).'" class="btn btn-xs btn-primary" target="_blank"><i class="far fa-eye"></i> View</a>';
            })

            ->filter(function ($query) use ($request) {
                if ($request->has('date_range') && ! is_null($request->get('date_range'))) {

                    $from = explode(' - ',$request->get('date_range'))[0];
                    $to = explode(' - ',$request->get('date_range'))[1];

                    $query->whereDate('created_at','>=',$from)->whereDate('created_at','<=',$to);
                }
                if($request->get('status')){

                    $query->where('type','=',$request->get('status'));
                }
                if($request->get('name')){

                    $name = strtolower(trim($request->get('name')));
                    $query->where('name', 'LIKE', "%{$name}%");
                }
                if($request->get('email')){
                    $query->where('email','=',trim($request->get('email')));
                }
                if($request->get('cnic')){
                    $query->where('cnic','=',trim($request->get('cnic')));
                }
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function show(Request $request,$id)
    {
        $evsUser = $this->user->find($id);

        if(!$evsUser){
            abort(404);
        }

        return view($this->viewPrefix.'show',compact('evsUser'));
    }

    public function updateStatus(Request $request ,$id)
    {
        $evsUser = $this->user->find($id);

        if(in_array($request->status,['approve','disapprove'])){
            if($request->status == 'approve') {
                $evsUser->type = User::$userType['evsUser'];

                $password = time();
                $evsUser->password_str = $password;
            }
            elseif($request->status == 'disapprove') {
                $evsUser->type = User::$userType['evsRejected'];
            }

            $evsUser->save();
            Mail::to($evsUser->email)->send(new EVSUserStatusMail($evsUser,$request->status));
        }

        return redirect()->back()->with('success','EVS status updated successfully');
    }

    public function changePassword(Request $request, $id)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:8',
        ]);
        $evsUser = $this->user->find($id);

        $evsUser->password = Hash::make($request->password);
        $evsUser->password_str = $request->password;
        $evsUser->update();

        return redirect()->back()->with('success','Change Password successfully');
    }

    public function importEVSUsers()
    {
        $query = "SELECT * FROM wp_cf7_vdata_entry where data_id in (SELECT data_id FROM wp_cf7_vdata_entry where name = 'approval_status' and VALUE = 'Approved') order by data_id";

        $evsUserIds = DB::connection('word_press')->select($query);

        $evsUserIds = array_unique($evsUserIds);

        foreach ($evsUserIds as $evsUserId)
        {
            $evsUser = DB::connection('word_press')->table('wp_evs_users')->where('data_id',$evsUserId)->get();

            $CNIC = $evsUser->where('name','your-cnic')->first()->value;

            if(!$this->user->where('cnic',$CNIC)->first())
            {
                $data = [
                    'type' => User::$userType['evsUser'],
                    'name' => $evsUser->where('name','first-name')->first()->value,
                    'father_name' => $evsUser->where('name','last-name')->first()->value,
                    'phone' =>  $evsUser->where('name','phone-number')->first()->value,
                    'email' => $evsUser->where('name','your-email')->first()->value,
                    'cnic' => $evsUser->where('name','your-cnic')->first()->value,
                    'facebook_profile_link' =>  $evsUser->where('name','your-facebook')->first()->value,
                    'city' =>  $evsUser->where('name','your-city')->first()->value,
                    'country' =>  $evsUser->where('name','your-country')->first()->value,

                    'cnic_front_image_path' =>  $evsUser->where('name','file-111')->first()->value,
                    'cnic_back_image_path' =>  $evsUser->where('name','file-941')->first()->value,
                    'utility_bill_image_path' => $evsUser->where('name','file-233')->first()->value,
                    'income_proof_image_path' => $evsUser->where('name','file-434')->first()->value
                ];

                $this->user->create($data);
            }
        }

        return 'import Done';
    }
}
