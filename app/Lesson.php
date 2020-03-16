<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Step;
class Lesson extends Model
{
    //protected $primaryKey = 'my_class_id';
    
    public function steps(){
        return $this->hasMany(Step::class);
    }
}
