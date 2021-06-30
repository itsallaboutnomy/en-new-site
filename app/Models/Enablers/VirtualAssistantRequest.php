<?php

namespace App\Models\Enablers;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VirtualAssistantRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'city',
        'contact_number',
        'va_experience',
        'speciality',
        'product_hunting',
        'listing_creation',
        'bulk_listing',
        'ppc',
        'listing_copy_writing',
        'keyword_research',
        'fba_shipment_creation',
        'product_launch',
        'images_designing',
        'a_plus_content_manager',
        'promotions_creation',
        'fbm_orders_management',
        'availability',
        'short_summary',
        'comments'
    ];

    protected $guarded = ['is_enabled'];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->slug = Str::slug($model->name, '-');
        });
        self::updating(function($model){
            $model->slug = Str::slug($model->name, '-');
        });
    }
    public function scopeEnabled($query)
    {
        return $query->where('is_enabled', true);
    }
}
