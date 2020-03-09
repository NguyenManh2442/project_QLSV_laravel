<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Subjects extends JsonResource
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
            'id' => $this->id,
            'subjectCode' => $this->subjectCode,
            'subjectName' => $this->subjectCode,
            'subjectTeacher' => $this->subjectTeacher,
            'startDay'=>$this->startDay
        ];
    }
}
