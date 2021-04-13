<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Stud_Jazykove_Znalosti extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ais_id','jazykove_znalosti_id','uroven'
    ];

    protected $table = "stud_jazykove_znalosti";


}
