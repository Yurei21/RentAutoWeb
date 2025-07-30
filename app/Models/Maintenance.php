<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    /** @use HasFactory<\Database\Factories\MaintenanceFactory> */
    use HasFactory;

    protected $fillable = ['vehicle_id', 'maintenance_date', 'details', 'cost'];

    public function car()
    {
        return $this->belongsTo(Vehicles::class, 'vehicle_id');
    }
}
