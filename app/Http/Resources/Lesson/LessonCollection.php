<?php

namespace App\Http\Resources\Lesson;

use Illuminate\Http\Resources\Json\Resource;

class LessonCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'number'=>$this->number,
            'href'=>[
                'link'=>route('lessons.show',$this->id),
            ]
        ];
    }
}
