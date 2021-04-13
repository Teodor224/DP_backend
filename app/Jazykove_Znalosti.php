<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Jazykove_Znalosti extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazov'
    ];

    protected $table = "jazykove_znalosti";


}
