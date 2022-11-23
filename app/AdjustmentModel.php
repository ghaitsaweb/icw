<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdjustmentModel extends Model
{
    protected $table = "adjust_master";
    protected $fillable = ['status','approve_date'];
}
