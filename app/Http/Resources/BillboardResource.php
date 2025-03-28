<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BillboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            "name"=>$this->name,
            "description"=>$this->description,
            "visibility"=>$this->visibility,
            "status"=>$this->status,
            "link"=>$this->link,
            "image_url"=>$this->image_url
        ];
    }
}
