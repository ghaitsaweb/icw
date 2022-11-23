<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AkibatModel extends Model
{
        protected $table = "tb_akibat";
        protected $fillable = ["akibat"];
        public $timestamps = false;

    public function request(){
        $this->hasOne('App\RequestModel','akibat');
    }

}
