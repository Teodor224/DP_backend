<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Firma_Files extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_URL','file','isProfile','firma_id'
    ];

    protected $table = "firma_files";


}
