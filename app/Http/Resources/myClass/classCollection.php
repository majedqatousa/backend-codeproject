<?php

namespace App\Http\Resources\myClass;

use Illuminate\Http\Resources\Json\Resource;

class classCollection extends Resource
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
            'classKey'=>$this->classKey,
            'href'=>[
                'link'=>route('classes.show',$this->id),
            ]
        ];
    }
}
