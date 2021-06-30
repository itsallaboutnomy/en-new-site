<?php

namespace App\Http\Controllers\Enablers;

use App\Models\Enablers\Event;
use App\Models\Enablers\Trainer;
use App\Models\Enablers\Training;
use App\Models\Enablers\TrainingBatch;
use App\Models\Enablers\SupportRequest;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    protected $supportRequest, $imagesDirectoryPath, $viewPrefix;

    public function __construct(SupportRequest $supportRequest)
    {
        $this->supportRequest = $supportRequest;
        $this->imagesDirectoryPath = $supportRequest::$imagesDirectoryPath;
        $this->viewPrefix = 'enablers.app.support.';
    }
    public function index()
    {
        return view($this->viewPrefix.'index');
    }
    public function create($slug)
    {
        $trainings = [];
        $trainingBatches = [];
        $trainers = [];
        $seminars = [];

        if($slug === 'refund-request'){
            $trainings = Training::enabled()->get();
            $seminars = Event::enabled()->where('type', 'seminar')->get();
        }else if($slug === 'payment-related-concern' || $slug === 'training-related-concern' || $slug === 'change-of-training-request'){
            $trainings = Training::enabled()->get();
        }
        else if($slug === 'change-of-mentor-request' || $slug === 'epas-concern'){
            $trainings = Training::enabled()->get();
            $trainers = Trainer::enabled()->get();
        }
        else if($slug === 'general-complaint' ){
            $trainingBatches = TrainingBatch::get();
        }

        return view($this->viewPrefix.$slug,
            compact('trainings','seminars','trainingBatches','trainers')
        );
    }
    public function refundRequestCreate(){
        $trainings = Training::enabled()->get();
        $seminars = Event::enabled()->where('type', 'seminar')->get();
        return view($this->viewPrefix.'refund-request',
            compact('trainings','seminars')
        );
    }
    public function paymentRelatedConcernCreate(){

        $trainings = Training::enabled()->get();
        return view($this->viewPrefix.'payment-related-concern', compact('trainings'));
    }
    public function trainingRelatedConcernCreate(){
        $trainings = Training::enabled()->get();
        return view($this->viewPrefix.'training-related-concern',
            compact('trainings')
        );
    }
    public function changeOfTrainingRequestCreate(){
        $trainings = Training::enabled()->get();
        return view($this->viewPrefix.'change-of-training-request',
            compact('trainings')
        );
    }
    public function changeOfMentorRequestCreate(){

        $trainings = Training::enabled()->get();
        $trainers = Trainer::enabled()->get();
        return view($this->viewPrefix.'change-of-mentor-request',
            compact('trainings','trainers')
        );
    }
    public function generalComplaintCreate(){
        $trainingBatches = TrainingBatch::get();
        return view($this->viewPrefix.'general-complaint',compact('trainingBatches'));
    }
    public function suggestionsCreate(){
        return view($this->viewPrefix.'suggestions');
    }
    public function evsConcernCreate(){
        return view($this->viewPrefix.'evs-concern');
    }
    public function epasConcernCreate(){
        $trainings = Training::enabled()->get();
        $trainers = Trainer::enabled()->get();
        return view($this->viewPrefix.'epas-concern', compact('trainings','trainers'));
    }

    public function store(Request $request)
    {
        $validationRules = [
            'name' => 'required|string|max:60',
            'email' => 'required|email|max:60',
            'phone' => 'required|string|max:15',
            'description' => 'nullable|string|max:600',
        ];
        $validationMessages = [];

        $successMessage = ' Request Submitted Successfully';

        if($request->request_type === 'refund-request'){
            $result = $this->getRefundRequestRules();

            $validationMessages = $result['messages'];
            $validationRules = array_merge($validationRules,$result['rules']);

            $successMessage = 'Refund '.$successMessage;
        }
        else if($request->request_type === 'payment-related-concern'){
            $result = $this->getPaymentRelatedConcernRules();

            $validationMessages = $result['messages'];
            $validationRules = array_merge($validationRules,$result['rules']);

            $successMessage = 'Payment Related Concern '.$successMessage;
        }
        else if($request->request_type === 'evs-concern'){
            $result = $this->getEVSConcernRules();

            $validationMessages = $result['messages'];
            $validationRules = array_merge($validationRules,$result['rules']);

            $successMessage = 'EVS Concern '.$successMessage;
        }
        else if($request->request_type === 'training-related-concern'){
            $result = $this->getTrainingRelatedConcernRules();

            $validationMessages = $result['messages'];
            $validationRules = array_merge($validationRules,$result['rules']);

            $successMessage = 'Training Related Concern '.$successMessage;
        }
        else if($request->request_type === 'change-of-training-request'){
            $result = $this->getChangeofTrainingRequestRules();

            $validationMessages = $result['messages'];
            $validationRules = array_merge($validationRules,$result['rules']);

            $successMessage = 'Change of Training '.$successMessage;
        }
        else if($request->request_type === 'change-of-mentor-request'){
            $result = $this->getChangeofMentorRequestRules();

            $validationMessages = $result['messages'];
            $validationRules = array_merge($validationRules,$result['rules']);

            $successMessage = 'Change of Mentor '.$successMessage;
        }
        else if($request->request_type === 'general-complaint'){
            $result = $this->getGeneralComplaintRules();

            $validationMessages = $result['messages'];
            $validationRules = array_merge($validationRules,$result['rules']);

            $successMessage = 'General Complaint '.$successMessage;
        }
        else if($request->request_type === 'suggestions'){
            $successMessage = 'Suggestions '.$successMessage;
        }
        else if($request->request_type === 'epas-concern'){
            $result = $this->getEPASConcernRequestRules();

            $validationMessages = $result['messages'];
            $validationRules = array_merge($validationRules,$result['rules']);

            $successMessage = 'EPAS Concern'.$successMessage;
        }

        $this->validate($request,$validationRules,$validationMessages);

        $data = $request->all();
        $data['request_type'] = $request->request_type;

        ###################  //Set for support ticket api ##################

        $data['channel'] = 'web';
        if(!empty($data['event_id'])){
            $data['seminar'] = Event::find($data['event_id'])->title;
        }
        if(!empty($data['training_id'])){
            $data['trainingname'] = Training::find($data['training_id'])->title;
        }

        if(!empty($data['trainer_id'])){
            $data['trainername'] = Trainer::find($data['trainer_id'])->name;
        }

        if(!empty($data['batch_id'])){
            $data['batch'] = TrainingBatch::find($data['batch_id'])->name;
        }

        #######################################################################

        if($request->hasFile('attachment')) {
            $attachment = $request->file('attachment')->store($this->imagesDirectoryPath.$request->request_type.'/');
            $data['attachment'] = $attachment;
        }

        $supportRequest = $this->supportRequest->create($data);
                try {
                    $this->apiGenerateSupportTicket($data);
                }
        catch (\Exception $exception) {
            \Log::error('>>>>>>>>>>>>>>>>  Error on API Support Ticket <<<<<<<<<<<<<<<<');
            \Log::error($exception->getMessage());
            \Log::error('===========================================================');
        }

        return redirect()->route('app.support.index')->with('success',$successMessage);
    }

    private function getRefundRequestRules()
    {
        $rules =  [
            'request_for' => ['required', Rule::in(['training','seminar','not_applicable'])],
            'reason' => 'required|string|max:100',

            'training_id' => 'required_if:request_for,training',
            'batch_id' => 'required_if:request_for,training',
            'event_id' => 'required_if:request_for,seminar',

            'date' => 'required_if:request_for,training',
            'no_of_classes' => 'required_if:request_for,training|max:20',
            'fee' => 'required_if:request_for,training|min:0|max:1000000',

            'attachment' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $messages =  [
            'event_id.required_if' => 'The seminar field is required.',

            'training_id.required_if' => 'The training field is required.',
            'batch_id.required_if' => 'The batch field is required.',
            'no_of_classes.required_if' => 'The classes field is required.',
            'fee.required_if' => 'The fee field is required.',
            'date.required_if' => 'The date field is required.',
        ];

        return [
            'rules' => $rules,
            'messages' => $messages
        ];
    }
    private function getPaymentRelatedConcernRules()
    {
        $rules =  [
            'training_id' => 'required',
            'date' => 'required',
            'attachment' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $messages =  [
            'training_id.required' => 'The training field is required.',
        ];

        return [
            'rules' => $rules,
            'messages' => $messages
        ];
    }
    private function getEVSConcernRules()
    {
        $rules =  [
            'request_for' => ['required', Rule::in(['free','paid'])],
            'date' => 'required',
        ];
        $messages =  [];
        return [
            'rules' => $rules,
            'messages' => $messages
        ];
    }
    private function getTrainingRelatedConcernRules()
    {
        $rules =  [
            'training_id' => 'required',
            'date' => 'required',
            'attachment' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $messages =  [
            'training_id.required_if' => 'The training field is required.',
        ];

        return [
            'rules' => $rules,
            'messages' => $messages
        ];
    }
    private function getChangeofTrainingRequestRules()
    {
        $rules =  [
            'reason' => 'required|string|max:100',
            'training_id' => 'required',
            'batch_id' => 'required',
            'no_of_classes' => 'required',
            'fee' => 'required',
        ];

        $messages =  [
            'training_id.required' => 'The training field is required.',
            'batch_id.required' => 'The batch field is required.',
            'no_of_classes.required' => 'The classes field is required.',
            'fee.required' => 'The fee field is required.',
        ];

        return [
            'rules' => $rules,
            'messages' => $messages
        ];
    }
    private function getChangeofMentorRequestRules()
    {
        $rules =  [
            'reason' => 'required|string|max:100',
            'training_id' => 'required',
            'batch_id' => 'required',
            'trainer_id' => 'required',
            'no_of_classes' => 'required',
        ];

        $messages =  [
            'training_id.required' => 'The training field is required.',
            'batch_id.required' => 'The batch field is required.',
            'trainer_id.required' => 'The trainer field is required.',
            'no_of_classes.required' => 'The classes field is required.',
        ];

        return [
            'rules' => $rules,
            'messages' => $messages
        ];
    }
    private function getGeneralComplaintRules()
    {
        $rules =  [
            'batch_id' => 'required',
            'attachment' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $messages =  [
            'batch_id.required' => 'The batch field is required.',
        ];

        return [
            'rules' => $rules,
            'messages' => $messages
        ];
    }

    private function getEPASConcernRequestRules()
    {
        $rules =  [
            'training_id' => 'required',
            'batch_id' => 'required',
            'trainer_id' => 'required',

        ];

        $messages =  [

            'training_id.required' => 'The training field is required.',
            'batch_id.required' => 'The batch field is required.',
            'trainer_id.required' => 'The trainer field is required.',

        ];

        return [
            'rules' => $rules,
            'messages' => $messages
        ];
    }

    private function _getFillableColumns()
    {
        return [
            'subject' =>'request_type',
            'channel' => 'channel',
            'studentname' => 'name',
            'studentnumber' => 'phone',
            'email' => 'email',
            'requestfor' => 'request_for',
            'seminar' => 'seminar',
            'seminar_id' => 'event_id',
            'trainingname' => 'trainingname',
            'training_id' => 'training_id',
            'trainername' => 'trainername',
            'trainer_id' => 'trainer_id',
            'batch' => 'batch',
            'batch_id' => 'batch_id',
            'reason' => 'reason',
            'description' => 'short_summary',
            'classestake' => 'no_of_classes',
            'attachment' => 'attachment',
            'bankaccountdetails' => 'attachment',
            'paymentproof' => 'attachment',
            'paymentdate' => 'date',
            'typeofevs' => 'request_for',
            'dateofapply' => 'date',
            'classschedule' => 'date',
            'fee' => 'fee',
            'complaintsubject' => 'request_type',
        ];
    }
    private function _getFillableData($data)
    {
        $fillables = $this->_getFillableColumns();

        $fillableData = [];

        foreach ($fillables as $key => $value) {

            if (!array_key_exists($value, $data)) {
                continue;
            }

            if ($data[$value] === '') {
                $fillableData[$key] = null;
                continue;
            }

            if ($value === 'request_type' && !empty($data[$value]) ) {
                $fillableData[$key] = ucfirst(str_replace('-', ' ', $data[$value]));
            }
            if ($value === 'attachment' && !empty($data[$value]) ) {
                $fillableData[$key] =             _asset($data[$value]);
            }
            else{
                $fillableData[$key] = $data[$value];
            }


        }
        return $fillableData;
    }

    public function apiGenerateSupportTicket($data)
    {
        $fillables = $this->_getFillableData($data);
        $postData = array_merge([
            'pipeline' => 1,
            'pipelineStage' => 1,
            'priority' => 2
        ], $fillables);
        $postData['subject'] = ucfirst(Arr::get($postData, 'subject'));
        $client = new \GuzzleHttp\Client();
        $options = [
            'headers' => [
                'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MzEsInVzZXJuYW1lIjoid2VidGlja2V0IiwidXNlcl90eXBlIjoiYXBpIiwiaXNBZ2VudCI6MCwiaWF0IjoxNjE2NDE1MDUzLCJleHAiOjIyNDcxMzUwNTMsInN1YiI6IjMxIn0.OJVtT_I2pVo5I3nJotFWQQaLbnaffZSHne-Frf90VXg',
                'Content-Type' => 'application/json',
                'Cache-Control' => 'no-cache'
            ],
            'json' => $postData
        ];
        $res = $client->request('POST', 'http://103.8.112.218:8890/apis/desk/tickets', $options);

        \Log::info('>>>>>>>>>>>>>>>>  Support Form API Response <<<<<<<<<<<<<<<<');
        \Log::info(print_r($res, true));
        \Log::info('============================================================');
    }

}
