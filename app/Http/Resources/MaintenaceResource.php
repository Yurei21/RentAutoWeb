<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MaintenaceResource extends JsonResource
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
            'vehicle_id' => new VehicleResource($this->vehicle_id),
            'maintenance_date' => (new Carbon($this->maintenance_date))->format('Y-m-d'),
            'details' => $this->details,
            'cost' => $this->cost,
        ];
    }
}
