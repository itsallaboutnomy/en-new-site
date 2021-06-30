<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EvsSeries extends Model
{
    use HasFactory;
    public static $imagesDirectoryPath = 'public/uploads/evs-images/';

    protected $fillable = [
        'order_number',
        'parent_id',
        'title',
        'is_enabled',
        'admin_status',
        'image_path',
        'short_summary',
        'content'
    ];
    protected $guarded = ['is_enabled','created_by','deleted_by'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->slug = Str::slug($model->title, '-');
        });
        self::updating(function($model){
            $model->slug = Str::slug($model->title, '-');
        });
    }
    public function scopeEnabled($query) {
        return $query->where('is_enabled', true);
    }

    public function setImagePathAttribute($value) {
        $this->attributes['image_path'] = str_replace('public/','storage/',$value);
    }

    public function category() {
        return $this->belongsTo(self::class,'parent_id');
    }

    public function videos() {
        return $this->hasMany(self::class,'parent_id');
    }
}
