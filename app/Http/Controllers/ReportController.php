<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {   
       $users = \DB::table('log_adjustment')
    //    ->where('6bln_detail.uuid', '=', $dpakai)
       ->get();
       //->toArray();

//dd($users);
        return view('report.index', compact('users')); 
        //->with('data', $data);
    }
}
