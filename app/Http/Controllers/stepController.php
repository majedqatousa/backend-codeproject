<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Step;
use App\Lesson;
class stepController extends Controller
{
    public function index(Lesson $lesson){
        return $lesson->steps;
    }
    function count($lessonId){
        $lesson=Lesson::find($lessonId);
        return $lesson->steps->count();
    }
    function getSteps(){
        $data= Step::all();
        return $data;
    }
    function getStepsLesson($lesson_id){
        $data=Step::find($lesson_id);
        return $data;
    }
    function getStepById($step_id){
        return Step::find($step_id);

    }
    function store(Request $request){
        $step = new Step;
        $step->id = $request->input('id');
        $step->name = $request->input('name');
        $step->number = $request->input('number');
        $step->description = $request->input('description');
        
        $step->lesson()->associate($request->input('lesson_id'));

        $result=$step->save();
        if($result==1){
            return "step is added";
        }else{
            return "Error";
        }
    }
    function destroy(){

    }
    function delete($id){
        $res=Step::where('id',$id)->delete();
    }
}
