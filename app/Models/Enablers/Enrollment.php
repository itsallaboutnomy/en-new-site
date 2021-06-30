<?php

namespace App\Models\Enablers;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enrollment extends Model
{
    use HasFactory;

    public static $imagesDirectoryPath = 'public/uploads/enrollment-images/';
    public static $pdfChallanDirectoryPath = 'public/enrollment-challans-pdf/';

    protected $fillable = [
        'enroll_for',
        'mode',

        'user_id',
        'event_id',
        'trainer_id',
        'training_id',
        'training_batch_id',
        'training_city_id',

        'counts',
        'unique_code',

        'is_paid',
        'approve_status',

        'payment_type',
        'transaction_type',
        'payable_price',
        'payment_account_id',

        'heard_from',
        'occupation',
        'comments',
        'challan_url'
    ];

    protected $guarded = ['is_paid','approve_status'];

    protected $appends = ['enroll_for_title'];

    public static $enrollForName = [
        'book' => 'Book',
        'seminar' => 'Seminar',
        'trainer' => 'Trainer',
        'training' => 'Training',
    ];

    public static $enrollFor = [
        'book', 'seminar', 'trainer', 'training',
    ];

    public static $enrollmentMode = [
        'online' => 'online',
        'faceToFace' => 'face-to-face',
    ];

    public static $paymentType = [
        'cash' => 'cash',
        'free' => 'free',
        'online' => 'online',
    ];

    public static $approveStatus = [
        'pending' => 'pending',
        'approved' => 'approved',
        'rejected' => 'rejected',
    ];

    public static $transactionType = [
        'local' => 'local',
        'international' => 'international',
    ];

    public function getEnrollForTitleAttribute() {
        return $this->attributes['enroll_for_title'] = self::$enrollForName[$this->enroll_for];
    }

    public function scopePaid($query){
        return $query->where('is_enabled', true);
    }

    public function scopeAccountantVerified($query){
        return $query->where('is_accountant_verified', true);
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function event(): BelongsTo {
        return $this->belongsTo(Event::class);
    }

    public function trainer(): BelongsTo {
        return $this->belongsTo(Trainer::class);
    }

    public function training(): BelongsTo {
        return $this->belongsTo(Training::class);
    }

    public function trainingBatch(): BelongsTo {
        return $this->belongsTo(TrainingBatch::class);
    }

    public function trainingCity(): BelongsTo {
        return $this->belongsTo(City::class,'training_city_id');
    }

    public function paymentAccount(): BelongsTo {
        return $this->belongsTo(PaymentAccount::class,'payment_account_id');
    }

    public function paymentProofs(): HasMany {
        return $this->hasMany(PaymentProof::class,'enrollment_id');
    }
}
