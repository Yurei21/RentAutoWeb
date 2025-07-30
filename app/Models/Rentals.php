<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentals extends Model
{
    /** @use HasFactory<\Database\Factories\RentalsFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'vehicle_id', 'rental_start_date', 'rental_end_date', 'total_cost', 'payment_status', 'status', 'barcode'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function car()
    {
        return $this->belongsTo(Vehicles::class, 'vehicle_id');
    }

    public function payment()
    {
        return $this->hasMany(Payments::class, 'rental_id');
    }
}
