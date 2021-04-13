<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Stud_PC_Znalosti extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ais_id','pc_znalosti_id','uroven'
    ];

    protected $table = "stud_pc_znalosti";


}
