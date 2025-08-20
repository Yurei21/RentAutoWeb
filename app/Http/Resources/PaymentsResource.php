<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentsResource extends JsonResource
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
            'rental_id' => new RentalsResource($this->rental_id),
            'amount_paid' => $this->amount_paid,
            'payment_method' => $this->payment_method,
            'payment_date' => (new Carbon($this->payment_date))->format('Y-m-d'),
            'pay_status' => $this->pay_status,
            'additionalOrLate_fee' => $this->additionalOrLate_fee,
        ];
    }
}
