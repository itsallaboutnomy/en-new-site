<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'shareholder',
        'address',
        'email',
        'cnic',
        'phone',
        'city',
        'country'
    ];
    protected $guarded = ['admin_status'];
}
