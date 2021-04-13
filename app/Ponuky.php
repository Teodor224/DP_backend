<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Ponuky extends Model
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazov','informacie','datum_od','datum_do','mzda','firma_id','krajina_id','kraj_id','mesto','program_id','zameranie_id','je_aktualna'
    ];

    protected $table = "ponuky";



}
