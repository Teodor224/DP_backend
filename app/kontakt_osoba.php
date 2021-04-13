<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class kontakt_osoba extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meno','priezvisko','tel','email','organizacia_id'
    ];

    protected $table = "kontakt_osoba";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */

}
