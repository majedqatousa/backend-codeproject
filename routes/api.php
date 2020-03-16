<?php
Route::group([
    'middleware' => 'api',
], function ($router) {
    
    Route::post('login', 'AuthController@login');
    Route::get('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('singup', 'AuthController@singup');
    Route::post('techerLogin', 'techerAuthController@login');
    Route::post('techerSingup', 'techerAuthController@singup');
    Route::post('techerLogout', 'techerAuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('getUser', 'AuthController@currentUser');
    Route::get('getClass','classController@index');
    Route::get('getClass/{class_id}','classController@getClassById');
    
    Route::post('addClass/{userId}','classController@addClass');
    Route::get('getLessons','lessonController@getLesson');
    Route::get('getLesson/{id}','lessonController@getLessonById');
    Route::get('getStep/{id}','stepController@getStepById');
    Route::get('getSteps','stepController@getSteps');
    Route::get('getStepsLesson/{id}','stepController@getStepsLesson');
    Route::get('find/{id}/user','classController@getUserClass');
    Route::get('find/{id}/usersClass','classController@getClassUsers');
    Route::post('join/{userId}','classController@join');
    Route::delete('unjoin/{user_id}/{class_id}','classController@unjoin');
    
    Route::get('find/{id}/class','lessonController@getClassLessons');
    Route::get('findByClassKey/{key}','classController@findByKey');
    Route::post('lesson/store/{id}','lessonController@store');
    Route::post('step/store','stepController@store');
    Route::get('allProjects','projectController@index');
    Route::post('addProject/{user_id}/{class_id}','projectController@store');
    Route::get('getProjectUser/{project_id}','projectController@getProjectUser');
    
    Route::get('getProject/{project_id}','projectController@getProjectById');

    Route::get('find/{id}/project','classController@getClassProjects');

    Route::get('steps/{lessonId}/count','stepController@count');
    
    Route::delete('lesson/delete/{lessonId}/{classId}','lessonController@delete');
    Route::delete('step/delete/{id}','stepController@delete');
    

    
});

Route::apiResource('classes','classController');
Route::group(['prefix'=>'classes'],function(){
    Route::apiResource('{class}/lessons','lessonController');
        
});
Route::apiResource('lessons','lessonController');
Route::group(['prefix'=>'lessons'],function(){
    Route::apiResource('{lesson}/steps','stepController');
});

Route::apiResource('user','AuthController');
Route::group(['prefix'=>'users'],function(){
    Route::apiResource('{user}/projects','projectController');
});




