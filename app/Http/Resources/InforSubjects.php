<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InforSubjects extends JsonResource
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
            'id'=> $this->id,
            'studentCode'=> $this->studentCode,
            'subjectCode'=> $this->subjectCode,
            'subjectName'=>$this->subjectName,
            'startDay'=> $this->startDay
        ];
    }
}
