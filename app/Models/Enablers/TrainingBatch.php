<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class TrainingBatch extends Model
{
    use HasFactory;
    protected $fillable = ['name','training_id'];

    protected $guarded = ['created_by','deleted_by'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->created_by = auth()->user()->id;
            $model->slug = Str::slug($model->name, '-');
        });
        self::updating(function($model){
            $model->slug = Str::slug($model->name, '-');
        });
        self::deleting(function($model){
            $model->deleted_by = auth()->user()->id;
        });
    }
    public function creator(): BelongsTo{
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }

    public function training(){
        return $this->belongsTo(Training::class,'training_id');
    }
}
