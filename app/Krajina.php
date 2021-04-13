<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Krajina extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nazov','kontinent'
    ];

    protected $table = "krajina";

    public function Studenti()
    {
        return $this->hasMany('App\Ais');
    }

}
