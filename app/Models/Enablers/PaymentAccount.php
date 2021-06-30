<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class PaymentAccount extends Model
{
    use HasFactory;

    protected $fillable = ['type','bank_name','account_title','account_number','iban'];

    protected $guarded = ['is_enabled','created_by','deleted_by'];

    public static $type = [
        'cash' => 'cash',
        'local' => 'local',
        'international' => 'international',
    ];

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

    public function scopeEnabled($query){
        return $query->where('is_enabled', true);
    }

    public function creator(): BelongsTo{
        return $this->belongsTo(User::class,'created_by')->select('id','name');
    }

    public static function getPaymentAccount($paymentFor,$paymentType,$transactionType,$specific)
    {
        $account = null;

        // for Seminar payments only
        if($paymentFor == 'seminar') {
            $account = self::whereType('local')->whereAccountTitle('The Enablers')->first();
        }

        // for training payments
        elseif($paymentFor == 'training' || $paymentFor == 'trainer' || $paymentFor == 'book')
        {
            // for cash challan
            if($paymentType == 'cash' and $transactionType == null) {
                $account = self::whereType('cash')->whereAccountTitle('Enablers')->first();
            }

            // for online international
            elseif($paymentType == 'online' and $transactionType == 'international') {
                $account = self::whereType('international')->whereBankName('PayPal')->first();
            }

            // for online local
            elseif($paymentType == 'online' and $transactionType == 'local')
            {
                // for specific trainings
                if($specific == 'PLB' or $transactionType == 'O2O') {
                    $account = self::whereType('local')->whereAccountTitle('The Eco Enablers System')->first();
                } else {
                    $account = self::whereType('local')->whereAccountTitle('The Enablers')->first();
                }
            }
        }

        return $account;
    }
}
