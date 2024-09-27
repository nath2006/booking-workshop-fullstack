<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'customer_bank_name',
        'customer_bank_account',
        'customer_bank_number',
        'booking_tx_id',
        'proof',
        'quantity',
        'total_amount',
        'is_paid',
        'workshop_id',
    ];

    public static function generateUniqueTrxId(){
        $prefix = 'AKTIV';
        do {
            $ranadomString = $prefix . mt_rand(1000, 9999);
        } while (selft::where('booking_trx_id' , $ranadomString)->existist());
    }

    public function participants(): HasMany{
        return $this->hasMany(WorkshopParticipants::class);
    }

    public function workshop(): BelongsTo{
        return $this->belongsTo(Workshop::lass);
    }
}
