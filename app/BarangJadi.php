<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BarangJadi extends Model
{ 
    protected $table = "stock_picking";
    protected $fillable = ["id"];
    public $timestamps = false;
    public function stockmove(){
        return $this->hasMany('App\Stockmove','id');
    }

    // public function request(){
    //     return $this->hasOne('App\RequestModel');
    // }
}
