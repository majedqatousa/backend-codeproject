<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\myClass;

use App\Http\Resources\Lesson\LessonResource;
use App\Http\Resources\Lesson\LessonCollection;

class lessonController extends Controller
{
    function index(myClass $class){
        return $class->lessons;
    }
    function getLesson(){
        $data= Lesson::all();
        return $data;
    }
    
    function getLessonById($id){
       $data=Lesson::find($id);
       return $data;
    }
    function store(Request $request,$id){
        $lesson = new Lesson;
        $lesson->id = $request->input('id');
        $lesson->name = $request->input('name');
        $lesson->number = $request->input('number');
        $result=$lesson->save();
        $class = myClass::find($id);
        $class->lessons()->attach($lesson->id);
        
      
    }
    function getClassLessons($id){
        return myClass::find($id)->lessons;
    }
    public function show(Lesson $lesson){
        return new LessonResource($lesson);
    }
    function delete($lessonId , $classId){
        //$lesson=Lesson::where('id',$lessonId);
        $class=myClass::find($classId);
        $class->lessons()->detach($lessonId);
       // $lesson->delete();
    }
}
