<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Napiste_Nam extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meno','priezvisko','email','sprava','nova_sprava','created_at'
    ];

    protected $table = "napiste_nam";


}
