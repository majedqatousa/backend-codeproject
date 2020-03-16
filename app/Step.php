<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Lesson;
use App\Project;
class Step extends Model
{
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }

    public function project(){
        return $this->hasOne(Project::class);
    }
}
