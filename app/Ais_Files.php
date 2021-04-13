<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Ais_Files extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_URL','file','isProfile','ais_id'
    ];

    protected $table = "ais_files";


}
