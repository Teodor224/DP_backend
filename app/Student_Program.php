<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Student_Program extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ais_id','stupen','rocnik','studentske_programy_id'
    ];

    protected $table = "student_program";

    public function ais()
    {
        return $this->belongsTo('App\Ais');
    }

    public function studentske_programy()
    {
        return $this->belongsTo('App\Studentske_Programy');
    }

}
