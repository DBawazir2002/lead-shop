<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "admin_id" => $this->id,
            'admin_name' => $this->name,
            'admin_email' => $this->email,
            'admin_role' => $this->roles->pluck('name')
        ];
    }
}
