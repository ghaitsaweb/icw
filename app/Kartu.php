<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kartu extends Model
{
    protected $table = "kartu_stock";
    protected $fillable = ["kartu"];
    public $timestamps = false;

    // public function request()
    // {
    //     $this->hasOne('App\RequestModel', 'akibat');
    // }
}
