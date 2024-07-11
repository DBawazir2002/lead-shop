<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\CountryResource;
class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "city_id"=> $this->id,
            "city_name"=> $this->name,
            "country"=> new CountryResource($this->whenLoaded("country")),
            // "country"=> $this->country()->country_code,
        ];
    }
}
