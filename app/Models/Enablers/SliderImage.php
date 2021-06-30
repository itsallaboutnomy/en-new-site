<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SliderImage extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/slider-images/';

    protected $fillable = ['order_number','image_alt_name','web_image_path','mobile_image_path'];

    protected $guarded = ['is_enabled','admin_status','created_by','deleted_by'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->created_by = auth()->user()->id;
        });
        self::deleting(function($model){
            $model->deleted_by = auth()->user()->id;
        });
    }

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    public function setWebImagePathAttribute($value)
    {
        $this->attributes['web_image_path'] = str_replace('public/','storage/',$value);
    }

    public function setMobileImagePathAttribute($value)
    {
        $this->attributes['mobile_image_path'] = str_replace('public/','storage/',$value);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }
}
