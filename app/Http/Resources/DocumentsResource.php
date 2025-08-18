<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DocumentsResource extends JsonResource
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
            'user_id' => new UserResource($this->user),
            'document_type' => $this->document_type,
            'document_path' => $this->document_path ? Storage::url($this->document_path) : '',
            'upload_date' => (new Carbon($this->upload_date))->format('Y-m-d'),
        ];
    }
}
