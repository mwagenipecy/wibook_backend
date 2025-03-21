<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'profile_photo_path'=>$this->profile_photo_path,
             'status'=>$this->status,
        ];
    }
}
