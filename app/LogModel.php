<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $table = "log";
    protected $fillable = ['name','edit_date'];
    public $timestamps = false;
    
}
