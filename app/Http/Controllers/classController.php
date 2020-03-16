<?php

namespace App\Http\Controllers;
use App\myClass;
use App\User;
use App\Lesson;
use App\Http\Resources\myClass\classResource;
use App\Http\Resources\myClass\classCollection;
use Illuminate\Http\Request;
class classController extends Controller
{
    function index(){
        $data= myClass::all();
        return $data;
    }
    public function show(myClass $class){
        return new classResource($class);
    }
    function getClassById($class_id){
        $class = myClass::find($class_id);
        return $class;
    }
    function addClass(Request $request , $userId){
        $myClass = new myClass;
        $myClass->id=$request->input('id');
        $myClass->name = $request->input('name');
        $myClass->classKey = $request->input('classKey');
        $result = $myClass->save();
        $user = User::find($userId);
        $user->classes()->attach($myClass->id);
       
        
    }
    function join(Request $request,$userId ){
        $class = new myClass;
        $class->class_id= $request->input('id');
        
        $user= User::find($userId);
        $user->classes()->attach($class->class_id);
        
    }
    function unJoin($user_id,$class_id){

        $user = User::find($user_id);
        $user->classes()->detach($class_id);
    }
    function getClass($userId){
        $data= myClass::all();
      
        return $data;
    }
    function getUserClass($id){
        return User::find($id)->classes;
    }
    function getClassUsers($id){
        return myClass::find($id)->users;
    }
    function getClassProjects($id){
        return myClass::find($id)->projects;
    }

    function findByKey($key){
        $class = DB::table('my_classes')->where([
            ['classKey', '=', $kye],
            
        ])->get();
    }
}
 