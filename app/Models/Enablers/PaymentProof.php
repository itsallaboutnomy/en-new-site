<?php

namespace App\Models\Enablers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentProof extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/payment-proofs/';

    protected $fillable = [
        'enrollment_id',
        'paid_price',
        'payment_date',

        'payment_receipt_path',
        'cnic_front_image_path',
        'cnic_back_image_path'
    ];

    public function setPaymentReceiptPathAttribute($value) {
        $this->attributes['payment_receipt_path'] = str_replace('public/','storage/',$value);
    }

    public function setCnicFrontImagePathAttribute($value) {
        $this->attributes['cnic_front_image_path'] = str_replace('public/','storage/',$value);
    }

    public function setCnicBackImagePathAttribute($value) {
        $this->attributes['cnic_back_image_path'] = str_replace('public/','storage/',$value);
    }

    public function enrollment(): BelongsTo{
        return $this->belongsTo(Enrollment::class);
    }

}
