<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'uuid'                   => $this->uuid,
            'name'                   => $this->name,
            'email'                  => $this->email,
            'balance'               => $this->balance,
            'avatar_tiny_url'        => $this->getFirstMediaUrl('avatar', 'tiny'),
            'avatar_small_url'        => $this->getFirstMediaUrl('avatar', 'small'),
            'avatar_medium_url'        => $this->getFirstMediaUrl('avatar', 'medium'),
            'avatar_large_url'        => $this->getFirstMediaUrl('avatar', 'large'),
            'created_at'             => $this->created_at,
            'updated_at'             => $this->updated_at,
        ];
    }
}
