<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use Auth;

class LokasiController extends Controller
{
    public function index()
    {

        $data = \   DB::table('master_gudang')  
        ->get();


        return view('lokasi.index',compact('data'));
    }
    public function detail($id)
    {     

        $ids=$id;

        $data = \   DB::table('mastergudang_detail')  
        ->where('mastergudang_detail.id_gudang', '=', $ids)
        ->get();//dd($data);

        return view('lokasi.indexdetail',compact('data','ids'));

    }
    public function detail1($id)
    {     

        $ids=$id;

        $data = \   DB::table('master_lokasi')  
        ->where('master_lokasi.id_detail', '=', $ids)
        ->get();//dd($data);

        return view('lokasi.indexdetail1',compact('data'));

    }
    public function create()
    {
        return view('lokasi.create');
    }
    public function loksave(Request $request)
    {   $date   = new DateTime(); 
        $auth = Auth::user()->email;

        $insert =\ DB::table('master_gudang')->insert(
            ['name_kode' => $request->kode,
            'name_gudang' => $request->nama,
            'aktor' => $auth,
            'create' => $date
            ]
              );
              

       if($insert){
              return route('lokasi.index');
            }
            else{
                echo 'GAGAL';
            }

    }
    public function edit($id)
    {  
        $ids=$id;
        $data = \   DB::table('master_gudang')  
        ->where('master_gudang.id', '=', $ids)
        ->first();//dd($data);
        return view('lokasi.edit',compact('data'));
    }
    public function lokedit(Request $request)
    {   $date   = new DateTime(); 
        $auth = Auth::user()->email;

              $update = \DB::table('master_gudang')->where([ 'id' => $request->id]) ->update(             ['name_kode' => $request->kode,
              'name_gudang' => $request->nama,
              'aktor' => $auth,
              'create' => $date
              ]); 
              

       if($update){
              return route('lokasi.index');
            }
            else{
                echo 'GAGAL';
            }

    }
    public function create1($id)
    {   $data = \   DB::table('master_gudang')  
        ->where('master_gudang.id', '=', $id)
        ->first();
        return view('lokasi.create1',compact('data','id'));
    }

}
