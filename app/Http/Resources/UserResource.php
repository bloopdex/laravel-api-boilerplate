<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray(Request $request)
    {
        return [
            'id' => $this->user_id,
            'username' => $this->username,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'roles' => $this->roles->map(function ($role) {
                return [
                    'english_name' => $role->english_name,
                    'arabic_name' => $role->arabic_name,
                ];
            }),
            'image' => $this->getMediaUrl(),
            'school_name' => $this->school->english_name,
        ];
    }
}
