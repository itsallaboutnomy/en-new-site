<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class TrainingCity extends Model
{
    use HasFactory;

    protected $fillable = ['training_id','city_id'];

    protected $guarded = ['created_by','deleted_by'];

}
