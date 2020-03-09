<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Students extends JsonResource
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
            'classCode' =>$this->classCode,
            'id' => $this->id,
            'studentCode' => $this->studentCode,
            'name' => $this->name,
            'email' => $this->email,
            'password'=>$this->studentCode,

        ];
    }
}
