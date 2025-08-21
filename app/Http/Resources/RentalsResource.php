<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RentalsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => new UserResource($this->user_id),
            'vehicle_id' => new VehicleResource($this->vehicle_id),
            'rental_start_date' => (new Carbon($this->rental_start_date))->format('Y-m-d'),
            'rental_end_date' => (new Carbon($this->rental_end_date))->format('Y-m-d'),
            'total_cost' => $this->total_cost,
            'payment_status' => $this->payment_status,
            'status' => $this->status,
            'barcode' => $this->barcode,
        ];
    }
}
