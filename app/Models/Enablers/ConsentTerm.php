<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentTerm extends Model
{
    use HasFactory;
    protected $fillable = ['consent_for','terms'];

    protected $guarded = ['is_enabled',];

    public function scopeEnabled($query) {
        return $query->where('is_enabled', true);
    }
}
