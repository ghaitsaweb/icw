<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   $data = \   DB::table('master_gudang')  
        ->get();
        //  dd($data);
        
        return view('dashboard.index',compact('data'));
    }
    public function detail($id)
    {     

        $ids=$id;

        $data = \   DB::table('mastergudang_detail')  
        ->where('mastergudang_detail.id_gudang', '=', $ids)
        ->get();//dd($data);

        return view('dashboard.indexdetail',compact('data'));

    }
    public function detail2($id)
    {     

        $ids=$id;

        $data = \   DB::table('master_lokasi')  
        ->where('master_lokasi.id_detail', '=', $ids)
        ->get();//dd($data);

        return view('dashboard.indexdetail2',compact('data'));

    }
    public function detail3($id)
    {     

        $ids=$id;

        $data = \   DB::table('kartu_stock')  
        ->where('kartu_stock.id_lok', '=', $ids)
        ->get();//dd($data);

        return view('dashboard.indexdetail3',compact('data'));

    }
}
