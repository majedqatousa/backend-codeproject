<?php

namespace App\Http\Resources\myClass;

use Illuminate\Http\Resources\Json\JsonResource;

class classResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
            'classKey'=>$this->classKey,
            'href'=>[
                'lessons'=>route('lessons.index',$this->id),
            ]
        ];
    }
}
