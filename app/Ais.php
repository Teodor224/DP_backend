<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Ais extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meno','skolsky_email','sukromny_email','heslo','priezvisko','informacie','datum_narodenia','mesto','ulica','stupen','krajina_id','kraj_id','tel_cislo','api_token','rola_id'
    ];

    protected $table = "ais";

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'heslo','login_ID'
    ];

    public function Student_Program()
    {
        return $this->hasMany('App\Student_Program');
    }

    public function Krajina()
    {
        return $this->belongsTo('App\Krajina');
    }
}
