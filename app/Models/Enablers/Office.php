<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Office extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/offices-images/';

    protected $fillable = ['order_number','title','city','timings','working_days','phone','mobile','fax','address','map_link','image_path','short_summary'];

    protected $guarded = ['is_head_office','is_enabled','admin_status','created_by','deleted_by'];

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

    public function scopeNotHeadOffice($query)
    {
        return $query->where('is_head_office', false);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtoupper($value);
    }

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtoupper($value);
    }

    public function setImagePathAttribute($value)
    {
        $this->attributes['image_path'] = str_replace('public/','storage/',$value);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }
}
