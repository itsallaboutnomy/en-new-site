<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Faq extends Model
{
    use HasFactory;
    protected $fillable = ['title','content'];

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


    public function scopeEnabled($query) {
        return $query->where('is_enabled', true);
    }

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }
}
