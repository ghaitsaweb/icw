<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MasterflowController extends Controller
{
    public function index()
    {   //$data = \DB::select(DB::raw("exec get_data_sales"));
        // $data =\DB::connection("pgsql")->statement('exec get_data_sales');
        // $data =DB::connection("pgsql")->statement("EXEC get_data_sales");
        // return $data;
    //     $data = \   DB::table('product_template')
    //     ->join('product_uom', 'product_uom.id', '=', 'product_template.uom_id')
    //     ->where('stock_move.picking_id', '=', $request->IDstock)
    //     ->get();
    //   dd($data);// exit();
       // echo $data->getContent();
       $users = DB::table('factor')
    //    ->where('6bln_detail.uuid', '=', $dpakai)
       ->get();
       //->toArray();

//dd($users);
        return view('masterflow.index', compact('users')); 
        //->with('data', $data);
    }
}
