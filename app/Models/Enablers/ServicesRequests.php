<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServicesRequests extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'cnic',
        'service',
        'employees',
        'office_address',
        'city',
        'country',
        'message'
    ];

}
