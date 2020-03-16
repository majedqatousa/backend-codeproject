<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\myClass;
use App\Project;


class User extends Authenticatable implements JWTSubject
{
  
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','isTecher','schoolName','score'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected function setPrimaryKey($key)
    {
        $this->primaryKey = $key;
    }
    function classes(){
        $this->setPrimaryKey('user_id');
        $relation = $this->belongsToMany(myClass::class, 'my_class_user', 'user_id', 'class_id', 'id', 'id');
        $this->setPrimaryKey('id');
        return $relation;
    }
    function projects(){
        return $this->hasMany(Project::class);
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

      // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}

