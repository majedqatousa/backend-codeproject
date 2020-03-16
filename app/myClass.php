<?php

namespace App;
use App\User;
use App\Lesson;
use App\Project;


use Illuminate\Database\Eloquent\Model;

class myClass extends Model

{
    protected function setPrimaryKey($key)
    {
        $this->primaryKey = $key;
    }
    public function lessons(){
        $this->setPrimaryKey('class_id');
        $relation = $this->belongsToMany(Lesson::class, 'lesson_class', 'class_id', 'lesson_id', 'id', 'id');
        $this->setPrimaryKey('id');
        return $relation;
    }
    protected $fillable = [
        'name','classKey'
    ];


    function users(){
        $this->setPrimaryKey('class_id');
        $relation = $this->belongsToMany(User::class, 'my_class_user', 'user_id', 'class_id', 'id', 'id');
        $this->setPrimaryKey('id');
        return $relation;
    }
    function projects(){
        $relation = $this->hasMany(Project::class,'class_id');
        return $relation;
    }

}
