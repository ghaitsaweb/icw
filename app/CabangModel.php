<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CabangModel extends Model
{
    protected $table = "cabang";
    protected $fillable = ["nama_cabang"];
    public $timestamps = false;
    public function user(){
        return $this->hasOne('App\User');
    }

    public function request(){
        return $this->hasOne('App\RequestModel');
    }
}
