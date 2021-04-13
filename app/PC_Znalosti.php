<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class PC_Znalosti extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazov'
    ];

    protected $table = "pc_znalosti";


}
