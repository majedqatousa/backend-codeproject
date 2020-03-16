<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProjectR;
use App\Http\Resources\ProjectRCollection;
use App\Project;

class projectController extends Controller
{

    function show(Project $project):ProjectR{
       
        return new ProjectR($project);
    }
    function index():ProjectRCollection{
        return new ProjectRCollection(Project::paginate());
    }
    function store(Request $request,$user_id,$class_id){
        $project = new Project;
        $project->name = $request->input('name');
        $project->description = $request->input('discription');
        $project->code = $request->input('code');
        $project->user()->associate($user_id);
        $project->pClass()->associate($class_id);
        
        $r=$project->save();
        if($r==1){
            return "project is added";
        }else{
            return "Error";
        }
    }
   
    function getProjectUser($project_id){
        $project = Project::find($project_id);
        return $project->user->name;
    

    }
    function getProjectById($project_id){
        return Project::find($project_id);

    }

}
