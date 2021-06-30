<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/trainings-images/';

    protected $fillable = [
        'order_number','key','slug','title','charging_fee','currency','starting_at','ending_at','short_summary',
        'training_benefits','summary','key_features','module_breakdown',
    ];

    protected $guarded = ['is_registration_open','is_enabled','admin_status','created_by','deleted_by'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->created_by = auth()->user()->id;
        });
        self::updating(function($model){
            $model->created_by = auth()->user()->id;
        });
        self::deleting(function($model){
            $model->deleted_by = auth()->user()->id;
        });
    }

    public function setStartingAtAttribute($value)
    {
        if($value){
            $this->attributes['starting_at'] = date('Y-m-d',strtotime($value));
        } else {
            $this->attributes['starting_at'] = NULL;
        }
    }

    public function setEndingAtAttribute($value)
    {
        if($value){
            $this->attributes['ending_at'] = date('Y-m-d',strtotime($value));
        } else {
            $this->attributes['ending_at'] = NULL;
        }
    }

    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }

    public function batches(){
        return $this->hasMany(TrainingBatch::class,'training_id');
    }

    public function cities(){
        return $this->belongsToMany(City::class);
    }
}
