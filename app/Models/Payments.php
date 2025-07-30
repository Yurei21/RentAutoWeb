<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentsFactory> */
    use HasFactory;

    protected $fillable = ['rental_id', 'amount_paid', 'payment_method', 'payment_date', 'pay_status', 'additionalOrLate_fee'];

    public function rental() 
    {
        return $this->belongsTo(Rentals::class, 'rental_id');
    }
}
