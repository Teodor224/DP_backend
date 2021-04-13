<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Ais_Ponuky extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status','komentar','hodnotenie','ais_id','ponuka_id','komentar_schvaleny'
    ];

    protected $table = "ziadosti";


}
