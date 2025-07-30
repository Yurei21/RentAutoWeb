<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    /** @use HasFactory<\Database\Factories\VehiclesFactory> */
    use HasFactory;

    protected $fillable = ['model', 'brand', 'rent-price', 'availability_status', 'license_plate', 'car_path'];

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class, 'vehicle_id');
    }
}
