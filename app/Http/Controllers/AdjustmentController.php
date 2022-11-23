<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use DateTime;
use App\SmfModel; 
use App\Prod; 
use App\UuidModel;
use App\AdjustmentModel; 
use App\Bulandetail;
use Auth;
class AdjustmentController extends Controller
{
    public function index()
    {   
       $users = DB::table('6bln_detail')
    //    ->where('6bln_detail.uuid', '=', $dpakai)
       ->get();
       //->toArray();

//dd($users);
        return view('adjustment.index', compact('users')); 
        //->with('data', $data);
    }
    public function approve(Request $request)
    {  
        $date   = new DateTime();
        $users=$request->id_master;
        $stat ='done';
        $auth = Auth::user()->email;
        
        $hasil = DB::table('adjust_master')->where('id', $users)->update(array('user_approve' => $auth,'status' => $stat,'approve_date' => $date));  
        return $hasil;
    }
    public function approve2(Request $request)
    {  
        $date   = new DateTime();
        $users=$request->id_master;
        $auth = Auth::user()->email;
        $stat ='done';
        $hasil = DB::table('adjust_master')->where('id', $users)->update(array('user_approve_1' => $auth,'status' => $stat,'approve_date_1' => $date));  
        return $hasil;
    }
    public function reject(Request $request)
    {  
        $date   = new DateTime();
        $users=$request->id_master;
        $reason=$request->value;//dd($reason);
        $auth = Auth::user()->email;
        $stat ='reject';
        $hasil = DB::table('adjust_master')->where('id', $users)->update(array('reason_r' => $reason,'reject_date_1' => $date,'user_reject' => $auth,'status' => $stat));  
        return $hasil;
    }
    public function create()
    { //dd($auth); 

        return view('adjustment.create');
    }
    public function upload(Request $request)
    {   $date   = new DateTime(); 
        $auth = Auth::user()->email;
        $req = Bulandetail::select('product_id',
        'nama_template',
        'default_code',
        'uom_name',
        'kategori')->where('idbulan','=', $request->id)->first();//dd($req->product_id); 
        $insert = DB::table('log_adjustment')->insert(
            ['product_id' => $req->product_id, 'tanggal' => $date,
            'nama_prod' => $req->nama_template, 'default_code' => $req->default_code,
            'status_action' => 'update', 'kategori_seb' => $req->kategori,'aktor' => $auth,'kategori_ssdh' => $request->value]
              );
              if($insert == TRUE){
        
    $update = DB::table('6bln_detail')->where([ 'idbulan' => $request->id]) ->update( [ 'kategori' => $request->value]); 
              }return  $update;            

        return view('adjustment.create');
    }
    public function hapus(Request $request)
    {  $id=$request->id;
        $adjust_master = DB::table('6bln_detail')
        ->where('6bln_detail.idbulan', '=', $id)->delete();
        //dd($adjust_master);
        $data = DB::table('6bln_detail')
        // ->where('6bln_detail.uuid', '=', $dpakai)
         ->get();
         $master = DB::table('adjust_master')
         // ->where('6bln_detail.uuid', '=', $dpakai)
          ->first();

         return view('adjustment.detailview', compact('data','master'));
    } //showadj
    public function showadj(Request $request)
    { 

        $data = DB::table('6bln_detail')
         ->get();
       $count = DB::table('6bln_detail')->count(); 
       $master = DB::table('adjust_master')
        ->first(); 

        return view('adjustment.detailview', compact('data','master','count'));
    }
    public function insertbanyakdup(Request $request)
    {   
        $date   = new DateTime(); 
        $auth = Auth::user()->email; //dd($auth);
        $adjust_master = DB::table('adjust_master')->delete();
        $blndetail = DB::table('6bln_detail')->delete();
        $dpakai = $date->format('Y-m-d');
        $values = array('status' => 'open','id_user_create' => $auth,'create_date' => $date,'uuid'=>$dpakai,'id_r'=>'1');
        $stt = DB::table('adjust_master')->insert($values);
        $id = DB::getPdo()->lastInsertId();
        

     if($stt == TRUE){
        $select = SmfModel::select(array('product_id',
        'name_template',
        'default_code',
        'uom_name',
        'x',
        'margin_prod',
        'aat',
        'kategori',
    'current_date','id_r' ));

        $bindings = $select->getBindings();
      $sukses =  DB::table('6bln_detail')->insertUsing([ 'product_id', 
        'nama_template', 
        'default_code', 
        'uom_name', 
        'x', 
        'margin', 
        'hasil', 
        'kategori', 
        'uuid','id_r'], $select);
        $data = DB::table('6bln_detail')
       // ->where('6bln_detail.uuid', '=', $dpakai)
        ->get();
        $master = DB::table('adjust_master')
        ->where('adjust_master.id', '=', $id)
        ->first();
        return view('adjustment.detail', compact('data', 'master'));
     }
    

        
    }
    public function create2()
    {
        $akibat   = AkibatModel::all();
        $penyebab     = PenyebabModel::all();
        $date = new DateTime();
        $req = RequestModel::select('no_req')->orderby('created_at','desc')->first();
  
        if($req != null){

            $bulan = $date->format('m');
            $bulanreq = substr($req->no_req,6,2);
            if($bulan == $bulanreq){
                $pcod = substr($req->no_req,13);
                $codplus = (int)$pcod + 1;
                $codigit = sprintf("%05s",$codplus);
                $kode = 'REQ/'.$date->format('dmY').'/'.$codigit;
            }else{
                $kode = 'REQ/'.$date->format('dmY').'/00001';
            }
        }else{

            $kode = 'REQ/'.$date->format('dmY').'/00001';
        }
        //dd($kode);
        return view('user/create',compact('penyebab','akibat','kode'));
    }
    public function insertbanyak(Request $request)
    {   
        $date   = new DateTime(); 
        $auth = Auth::user()->email; //dd($auth);
        $adjust_master = DB::table('adjust_master')->delete();
        $blndetail = DB::table('6bln_detail')->delete();
        $dpakai = $date->format('Y-m-d');
        $values = array('status' => 'open','id_user_create' => $auth,'create_date' => $date,'uuid'=>$dpakai,'id_r'=>'1');
        $stt = DB::table('adjust_master')->insert($values);
        $id = DB::getPdo()->lastInsertId();
        

     if($stt == TRUE){
        $select = Prod::select(array('product_id',
        'name_template',
        'default_code',
        'uom_name',
        'kategori',
        'uuid')); 


        $bindings = $select->getBindings();
        $sukses =  DB::table('6bln_detail')->insertUsing([ 'product_id', 
        'nama_template', 
        'default_code', 
        'uom_name', 
        'kategori', 
        'uuid'], $select);
        $update = DB::table('6bln_detail') ->update( [ 'uuid' => $id]); 

        $data = DB::table('6bln_detail')
       ->where('6bln_detail.uuid', '=', $id)
        ->get();;
        $master = DB::table('adjust_master')
        ->where('adjust_master.id', '=', $id)
        ->first();
        return view('adjustment.detail', compact('data', 'master'));
     }
    

        
    }

} 
