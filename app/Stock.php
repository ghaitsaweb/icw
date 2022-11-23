<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = "stock_move";
    protected $fillable = ['id','origin','picking_id'];

    public function barangjadi(){
        return $this->belongsTo('App\Barangjadi','picking_id');
    }

}
