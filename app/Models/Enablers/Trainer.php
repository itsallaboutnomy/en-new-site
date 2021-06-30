<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trainer extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/trainer-images/';

    protected $fillable = [
        'order_number',
        'name',
        'designation',

        'mentorship_fee',
        'is_mentorship_enabled',
        'mentorship_fee_currency',

        'per_hour_fee',
        'is_per_hour_enabled',
        'per_hour_fee_currency',

        'profile_image_path',
        'summary'
    ];

    protected $guarded = ['is_enabled','admin_status','created_by','deleted_by'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->slug = Str::slug($model->name, '-');
            $model->created_by = auth()->user()->id;
        });
        self::updating(function($model){
            $model->slug = Str::slug($model->name, '-');
        });
        self::deleting(function($model){
            $model->deleted_by = auth()->user()->id;
        });
    }

    public function setProfileImagePathAttribute($value) {
        $this->attributes['profile_Image_path'] = str_replace('public/','storage/',$value);
    }

    public function scopeEnabled($query) {
        return $query->where('is_enabled', true);
    }

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }
}
