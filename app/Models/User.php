<?php

namespace App\Models;

use App\Models\Quiz\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public static $imagesDirectoryPath = 'public/uploads/users-images/';

    public static $userType = [
        'adminGenerated' => 'admin-generated',

        'evsUser' => 'evs-user',
        'evsRejected' => 'evs-rejected',
        'evsVisitor' => 'evs-visitor',

        'seminarVisitor' => 'seminar-visitor',
        'seminarStudent' => 'seminar-student',

        'trainingVisitor' => 'training-visitor',
        'trainingStudent' => 'training-student',
        'bookVisitor' => 'book-visitor',
    ];

    protected $fillable = [
        'type',
        'name', 'father_name',
        'email', 'cnic',
        'phone', 'city', 'country',

        'profile_image_path',
        'facebook_profile_link',

        'cnic_front_image_path',
        'cnic_back_image_path',

        'utility_bill_image_path',
        'income_proof_image_path',
        'password',
        'password_str'
    ];

    protected $guarded = ['is_enabled', 'created_by', 'deleted_by'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasRole( ... $roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
        }
        return false;
    }

    public function assignRole( ... $assignRoles) {
        $roles = Role::whereIn('name',$assignRoles)->get();

        if(count($roles) == 0)
            return false;

        $this->roles()->saveMany($roles);

        return true;
    }

    public function roles() {
        return $this->belongsToMany(Role::class,'user_roles');
    }

    public function setProfileImagePathAttribute($value) {
        $this->attributes['profile_Image_path'] = str_replace('public/', 'storage/', $value);
    }

    public function scopeAdminGenerated($query) {
        return $query->whereType(self::$userType['adminGenerated']);
    }

    public function scopeHavingRoles($query,$roles)
    {
        return $query->whereHas('roles',function ($q) use ($roles){
            $q->whereIn('name',$roles);
        });
    }

    public function scopeNotHavingRoles($query,$roles)
    {
        return $query->whereHas('roles',function ($q) use ($roles){
            $q->whereNotIn('name',$roles);
        });
    }
}
