<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestModel;
use Illuminate\Support\Facades\Auth;
use DateTime;
use Mail;
use Image;
use App\User;
use App\PenyebabModel;
use App\AkibatModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelapor = Auth::user()->name;
        $request = RequestModel::where('pelapor',$pelapor)->orderby('id','desc')->with('rel_penyebab','rel_akibat')->get();
        return view('user/index',compact('request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

    public static function randomuniqueCode($length = 8)
    {
     $table =(new static)->getTable();
     $column='unique_code';

     $id= strtolower(str_random($length));
     $data=['id'=>$id];
     $rules=['id'=>'unique:'.$table.','.$column];

     $validator=validator()->make($data,$rules);
     if($validator->fails()){
         $this->randomuniqueCode();
     }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestmodel = new Requestmodel();
        $requestmodel->pelapor = $request->pelapor;
        $requestmodel->cabang_id = $request->cabang_id;
        $requestmodel->status = $request->status;
        $requestmodel->aktor = $request->aktor;
        $requestmodel->proseshelp = $request->proseshelp;
        $requestmodel->prosesrnd = $request->prosesrnd;
        $requestmodel->prosesinfra = $request->proseshelp;
        $requestmodel->prosesfinance = $request->prosesfinance;
        $requestmodel->prosessupplychain = $request->prosessupplychain;
        $requestmodel->tgl_proses = $request->tgl_proses;
        $requestmodel->chiefstore = $request->chiefstore;
        $requestmodel->rejectchiefstore = $request->rejectchiefstore;
        $requestmodel->tgl_approved = $request->tgl_approved;
        $requestmodel->tgl_rejected = $request->tgl_rejected;
        $requestmodel->tgl_solved = $request->tgl_solved;
        $requestmodel->tgl_close = $request->tgl_close;
        $requestmodel->no_req = $request->no_req;
        $requestmodel->spk = $request->spk;
        $requestmodel->permintaan = $request->permintaan;
        $requestmodel->penyebab = $request->penyebab;
        $requestmodel->dll_penyebab = $request->dll_penyebab;
        $requestmodel->akibat = $request->akibat;
        $requestmodel->dll_akibat = $request->dll_akibat;
        $requestmodel->permintaan = $request->permintaan;
        $requestmodel->penyebab = $request->penyebab;
        
        if ($request->hasFile('lampiran')) {
            $file   = $request->file('lampiran');
            $date   = new DateTime();
            $dpakai = $date->format('dmY');
            $name   = 'REQ'.$dpakai . time().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('/imgreq/'.$name);
            //$file->move($destinationPath, $name);
            $img = Image::make($file)->resize(750, 1100, function($constraint) {
            $constraint->aspectRatio();
            });
            $img->save($destinationPath);
            $requestmodel->lampiran = $name;
        }
        
        else{
            $requestmodel->lampiran = $request->lampiran;
        }

        $requestmodel->save();
        
        return redirect(route('user.index'))->with('pesan','berhasil');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akibat   = AkibatModel::all();
        $penyebab  = PenyebabModel::all();
       $request = RequestModel::find($id);
       return view('user.edit',compact('request','akibat','penyebab'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

