<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;


class Blog extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/blogs/';
    protected $fillable = ['title','slug','blog_image','author','date','category','short_summary','content'];

    protected $guarded = ['is_enabled','created_by','deleted_by'];

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

    public function setDateAttribute($value) {
        if($value){
            $this->attributes['date'] = date('Y-m-d',strtotime($value));
        } else {
            $this->attributes['date'] = null;
        }
    }
    public function setBlogImageAttribute($value)
    {
        $this->attributes['blog_image'] = str_replace('public/','storage/',$value);
    }

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }
}
