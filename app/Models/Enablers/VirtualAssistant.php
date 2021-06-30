<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VirtualAssistant extends Model
{
    use HasFactory;
    /**
     * @property string $name
     * @property string $experience_level
     * @property string|Nullable $facebook_link
     * @property string|Nullable $linkedin_link
     * @property string|Nullable $img_path
     */

    public static $imagesDirectoryPath = 'public/uploads/virtual-assistant-images/';

    protected $fillable = ['name','experience_level','facebook_link','linkedin_link','img_path'];

    protected $guarded = ['is_enabled','created_by','deleted_by'];

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

    public function scopeEnabled($query) {
        return $query->where('is_enabled', true);
    }

    public function setImgPathAttribute($value) {
        $this->attributes['img_path'] = str_replace('public/','storage/',$value);
    }

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }

    public function skills() {
        return $this->belongsToMany(Skill::class,'virtual_assistant_skills','virtual_assistant_id','skill_id');
    }

}
