<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class VehicleResource extends JsonResource
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
            'model' => $this->model,
            'rent_price' => $this->rent_price,
            'availabilty_status' => $this->availability_status,
            'license_plate' => $this->license_plate,
            'car_path' => $this->car_path ? Storage::url($this->car_path) : '',
        ];
    }
}
