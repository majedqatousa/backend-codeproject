<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Step;
use App\User;
use App\myClass;


class Project extends Model
{
    protected $fillable = [
        'name', 'discription', 'code','user_id','class_id'
    ];
    function step(){
        return $this->belongsTo(Step::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
    function pClass(){
        return $this->belongsTo(myClass::class,'class_id');
    }
}
