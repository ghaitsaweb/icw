<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LokasiModel extends Model
{
    protected $table = "master_lokasi";
    protected $fillable = ["kartu"];
    public $timestamps = false;
}
