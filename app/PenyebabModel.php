<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PenyebabModel extends Model
{

        protected $table = "tb_penyebab";
        protected $fillable = ["penyebab"];
        public $timestamps = false;

        public function request(){
            $this->hasOne('App\RequestModel','penyebab');
        }

}
