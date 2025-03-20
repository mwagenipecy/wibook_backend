<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectTransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id ?? 1,
            'description' => $this->description,
            'amount' => $this->amount,
            'type' => $this->type,
            'user' => $this->user ? [
                'id' => $this->user->id ?? 1,
                'name' => $this->user->name,
                'email' => $this->user->email,
            ] : null,
            'project' => $this->project ? [
                'id' => $this->project->id ?? 1,
                'title' => $this->project->name,
            ] : null,
            'date' => $this->date,
            // 'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            // 'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];

    }
}
