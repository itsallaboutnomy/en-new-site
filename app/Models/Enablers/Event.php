<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/events-images/';

    protected $fillable = ['order_number','type','key','title','topic','location','venue','charging_fee','currency','host_name','host_designation',
        'starting_at','short_summary'];

    protected $guarded = ['is_enabled','admin_status','created_by','deleted_by'];

    public static $type = [
        'seminar' =>'seminar',
        'upcomingEvent'=>'upcoming'
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->created_by = auth()->user()->id;
            $model->slug = Str::slug($model->title, '-');
        });
        self::updating(function($model){
            $model->slug = Str::slug($model->title, '-');
        });
        self::deleting(function($model){
            $model->deleted_by = auth()->user()->id;
        });
    }

    public function setStartingAtAttribute($value) {
        if($value){
            $this->attributes['starting_at'] = date('Y-m-d',strtotime($value));
        } else {
            $this->attributes['starting_at'] = null;
        }
    }

    public function scopeEnabled($query) {
        return $query->where('is_enabled', true);
    }

    public function scopeEvents($query) {
        return $query->whereType(self::$type['seminar']);
    }

    public function scopeUpComingEvents($query) {
        return $query->whereType(self::$type['upcomingEvent']);
    }

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }
}
