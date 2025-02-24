<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
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
            'student_name' =>  $this->student_name,
            'student_email' =>  $this->student_email,
            'student_phone' =>  $this->student_phone,
            'student_dob' =>  $this->student_dob,
            'student_address' =>  $this->student_address,
            'is_active' =>  $this->active,
            'status' =>  $this->status,
        ];
    }
}
