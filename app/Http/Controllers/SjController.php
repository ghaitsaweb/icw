<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DateTime;

class SjController extends Controller
{
    public function index()
    {
        // $kartu = Kartu::all();

        $kartu = \   DB::table('kartu_stock')  
        ->leftjoin('product_product', 'kartu_stock.product_id', '=', 'product_product.id')
        ->leftjoin('product_template', 'product_product.product_tmpl_id', '=', 'product_template.id')
        ->select('kartu_stock.id as id',
        'kartu_stock.idbpj as idbpj',
        'kartu_stock.product_id',
        'kartu_stock.nama_barang as nama_barang',
        'kartu_stock.default_code',
        'kartu_stock.productionlot',
        'kartu_stock.qty as qty',
        'kartu_stock.kategori_barang as kategori_barang'
        ,'kartu_stock.id_stockmove as id_stockmove',
        'kartu_stock.qty_gerak as qty_gerak','kartu_stock.created_date','kartu_stock.created',
        'kartu_stock.uom',
        'kartu_stock.id_lok'
        ,'product_template.use_time')
        ->get();
        // dd($kartu);
        return view('akun.index', compact('kartu'));
    }
    public function barcode(Request $request)
    {  // dd($request);
        $data = \   DB::table('kartu_stock')  
        ->leftjoin('master_lokasi', 'master_lokasi.id', '=', 'kartu_stock.id_lok')
        ->where('kartu_stock.id', '=', $request->id)
        ->select('kartu_stock.id as iddetail','kartu_stock.product_id', 'kartu_stock.nama_barang as nama_barang','kartu_stock.default_code',
        'kartu_stock.productionlot','kartu_stock.qty as qty','kartu_stock.kategori_barang as kategori_barang'
        ,'kartu_stock.id_stockmove as id_stockmove','kartu_stock.qty_gerak as qty_g','master_lokasi.nama_lokasi as nama_lokasi')
        ->first();
        $qty  = $data->qty;
        $kode = substr($data->default_code,0,3); //dd($kode);

        $data = ['title' => $request->id,'jumlah' => $qty,'jumlah' => $kode];
        $pdf = PDF::loadView('akun.myPDF', $data)->setPaper([0, 0, 175,280], 'landscape');
  
        return $pdf->download('Barcode_ICW'.'_'.$kode.'_'.$request->id.'.pdf');
        // return view('akun.myPDF');  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  $cek = User::all();
        $BarangJadi = \   DB::table('stock_picking')  
                           ->select('id','name')
                                  ->where('name', 'like', 'SJ%%%%H%')
                                  ->where('state', '=', 'done')
                                  ->orderby('name', 'desc')->get();
                                 
        return view('sj.create', compact('BarangJadi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if($request->password != $request->confirm_password){
        //     return redirect(route('akun.create'))
        //     ->with([
        //         'pesan' => 'Password dan konfirmasi password tidak sama',
        //         'name'  => $request->name,
        //         'email' => $request->email,
        //         'hak_akses' => $request->hak_akses
        //     ]);
        // }
        //     $email=$request->email;
        //    // dd($email);
        //    $cek = User::where('email','==',$email);
        //    dd($email,$cek);
        $user = new User();

        $request['password'] = Hash::make($request->password);
        $user->name = $request->name;
        $user->cabang_id = $request->cabang_id;
        $user->email = $request->email;
        $user->userstatus = $request->userstatus;
        $user->password = $request->password;
        $user->hak_akses = $request->hak_akses;
        if ($request->hasFile('tandatangan')) {
            $file = $request->file('tandatangan');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/images/' . $name);
            $img = Image::make($file)->resize(200, 100, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($destinationPath);
            $user->tandatangan = $name;
        } else {
            $user->tandatangan = $request->tandatangan;
        }


        $user->save();

        return redirect(route('akun.index'))->with('pesan', 'Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
    }
    public function index1()
    {
        $msg = "This is a simple message.";
        return response()->json(array('msg' => $msg), 200);
    }

    public function detail_json($id)
    {     

        $ids=$id;

        $data = \   DB::table('master_lokasi')  ->where('master_lokasi.id', '=', $ids)
        ->select('id','nama_lokasi', 'gudang',
        'kategori',
        'kapasitas','terpakai','id_detail')
        ->first();//dd($data);
return json_encode($data);

    }
    public function detail_json_all()
    {   
        return  json_encode(LokasiModel::all());

    }
    public function detail($id)
    {     

        $ids=$id;

        $data = \   DB::table('kartu_stock')  
        ->leftjoin('master_lokasi', 'master_lokasi.id', '=', 'kartu_stock.id_lok')
        ->where('kartu_stock.id', '=', $ids)
        ->select('kartu_stock.id as iddetail','kartu_stock.product_id', 'kartu_stock.nama_barang as nama_barang','kartu_stock.default_code',
        'kartu_stock.productionlot','kartu_stock.qty as qty','kartu_stock.kategori_barang as kategori_barang'
        ,'kartu_stock.id_stockmove as id_stockmove','kartu_stock.qty_gerak as qty_g','master_lokasi.nama_lokasi as nama_lokasi')
        ->first();//dd($data);
      $ak = substr($data->default_code,0,3); 

        $suggest = \   DB::table('lok')  
        ->where('lok.kategori', '=', $data->kategori_barang)
        ->where('lok.gudang', '=', $ak)
        ->select('lok.id as id','lok.nama_lokasi as nama','lok.gudang as gudang','lok.kategori as kategori','lok.kapasitas as kapasitas','lok.terpakai as terpakai','lok.percent as percent','lok.pr as pr')
        ->orderBy('lok.percent', 'DESC')
        ->limit(3)
        ->get();//dd($suggest);
        $manual = \   DB::table('lok')  
        //->where('lok.kategori', '=', $data->kategori_barang)
       // ->where('lok.gudang', '=', $ak)
        ->select('lok.id as id','lok.nama_lokasi as nama','lok.gudang as gudang','lok.kategori as kategori','lok.kapasitas as kapasitas','lok.terpakai as terpakai','lok.percent as percent','lok.pr as pr')
        ->orderBy('lok.terpakai', 'ASC')
        ->get();

        return view('akun.detailkartu',compact('ids','data','suggest','manual'));

    }
    public function hapus(Request $request)
    {     $data = \   DB::table('kartu_stok_detail')  
        ->where('kartu_stok_detail.id_kartustock', '=', $request->id)
        ->select('kartu_stok_detail.keluar','kartu_stok_detail.idmaster')
        ->first();
        $keluar =$data->keluar;
        $idmaster =$data->idmaster;
    $data1 = \   DB::table('kartu_stock')  
    ->where('kartu_stock.id', '=', $idmaster)
    ->select('kartu_stock.qty_gerak')
    ->first();
     $qty_gerak =$data1->qty_gerak;
     $updt =  $qty_gerak+$keluar;
    $update = \ DB::table('kartu_stock')->where('id', $idmaster)->update(array('qty_gerak' => $updt)); 
   if($update==1){
    $deletedRows = DB::table('kartu_stok_detail')
    ->where('kartu_stok_detail.id_kartustock', '=', $request->id)
    ->delete();
    $angka='Berhasil Hapus';
        }
          else{
            $angka='gagal hapus Coba Ulangi !';
          }
          return json_encode($angka);

        // $data = \   DB::table('kartu_stok_detail')  
        // ->where('kartu_stok_detail.idmaster', '=', $request->id)
        // ->get();
        // //dd($data);
        // return view('akun.dkartu',compact('data'));
    }
    public function buatsj(Request $request)
    {   
        $date   = new DateTime();
        $auth = Auth::user()->email;
   
    $data = \   DB::table('kartu_stock')  
    ->where('kartu_stock.id', '=', $request->IDstock)
    ->select('kartu_stock.qty_gerak')
    ->first();

    
    $operation = \   DB::table('stock_pack_operation')  
    ->where('stock_pack_operation.id', '=', $request->idoperation)
    ->select('stock_pack_operation.qty_done')
    ->first();

    $angka =$data->qty_gerak;
    if($angka<$operation->qty_done){
        return json_encode('qty lebih besar dibandingkan stock'); exit();
    }
    $hasil    =  $angka - $operation->qty_done; 
    $updateop = \ DB::table('stock_pack_operation')->where('id', $request->idoperation)->update(array('x_flag_rak' => 1)); 
    $update   = \ DB::table('kartu_stock')->where('id', $request->IDstock)->update(array('qty_gerak' => $hasil)); 
   if($update==1){
       $insert = \ DB::table('kartu_stok_detail')->insert(
        ['idmaster' => $request->IDstock, 'tanggal_masuk' => $date,
        'masuk' => null, 'keluar' => $operation->qty_done, 'created_date' => $date, 'created' => $auth, 'state' => 'created', 'del_ackt' => NULL,
        'idoperation' => $request->idoperation]
          ); 
        }
          if($insert==true){
               $angka='Berhasil Menambahkan';

          }
          else{
            $angka='gagal Menambahkan Coba Ulangi !';
          }
          return json_encode($angka);
    }
    public function qtyin(Request $request)
    { 
        $date   = new DateTime();
        $auth = Auth::user()->email;
   
    $data = \   DB::table('kartu_stock')  
    ->where('kartu_stock.id', '=', $request->id)
    ->select('kartu_stock.qty_gerak')
    ->first();
    $angka =$data->qty_gerak;
    $hasil =  $angka + $request->qtyin; 
    $update = \ DB::table('kartu_stock')->where('id', $request->id)->update(array('qty_gerak' => $hasil)); 
   if($update==1){
       $insert = \ DB::table('kartu_stok_detail')->insert(
        ['idmaster' => $request->id, 'tanggal_masuk' => $date,
        'masuk' => $request->qtyin, 'keluar' => null, 'created_date' => $date, 'created' => $auth, 'state' => 'created', 'del_ackt' => NULL]
          ); 
        }
          if($insert==true){
               $angka='Berhasil Menambahkan ';

          }
          else{
            $angka='gagal Menambahkan Coba Ulangi !';
          }
          return json_encode($angka);
    }
    public function showt(Request $request)
    {   
        $bpj =  $request->IDstock; 
        $data = \ DB::table('SJDONE')
                ->where('SJDONE.id', $bpj)
                  ->get();//dd($data);
        return view('sj.detail',compact('data', 'bpj'));
    }
    public function cek()
    {
          
        $bpj =  $request->IDstock;
        $data = \   DB::table('stock_move')
        ->join('product_product', 'product_product.id', '=', 'stock_move.product_id')
        ->join('product_template', 'product_product.product_tmpl_id', '=', 'product_template.id')
        ->join('product_uom', 'product_template.uom_id', '=', 'product_uom.id')
        ->leftjoin('stock_picking', 'stock_picking.id', '=', 'stock_move.picking_id')
        ->join('mrp_production', 'mrp_production.name', '=', 'stock_picking.origin')
        ->join('stock_production_lot', 'stock_production_lot.id', '=', 'mrp_production.lot_id')
        ->leftjoin('kartu_stock', 'kartu_stock.id_stockmove', '=', 'stock_move.id')
        ->where('stock_move.picking_id', '=', $request->IDstock)
        ->leftjoin('adjustment', 'adjustment.product_id', '=', 'stock_move.product_id')  
        ->select('stock_move.id as id','stock_move.x_kartu', 'product_template.name as name_template','stock_production_lot.name','stock_move.product_uom_qty','adjustment.kategori as kategori','stock_move.product_id as product_id'
        ,'product_product.default_code as default_code','product_uom.name as uomname','kartu_stock.id as id_card')
        ->get();

        return view('akun.detail',compact('data', 'bpj'));

    }
    public function details(Request $request)
    {     

        $data = \   DB::table('kartu_stok_detail')  
        ->where('kartu_stok_detail.idmaster', '=', $request->id)
        ->get();
        return view('akun.dkartu',compact('data'));
    }
    public function posts(Request $request)
    {   $auth = Auth::user()->email; 
        $date   = new DateTime();
        $data = \   DB::table('kartu_stock')  
        ->where('kartu_stock.id', '=', $request->id)
        ->first();  //dd($data);
       if(empty($data->id_lok)){
        $hasil = \ DB::table('kartu_stock')->where('id', $request->id)->update(array('id_lok' => $request->value)); 
        $idlocks = $request->value;
           }
           else{
            $idlocks = $data->id_lok;
               }
        $insert = \ DB::table('lokasi_log')->insert(
            ['id_kartu' => $request->id, 'id_lok_seb' => $idlocks,
            'id_lok_sessdh' => $request->value, 'aktor' => $auth, 'create_date' => $date]
              ); 
        if($insert==true){
            $hasil = \ DB::table('kartu_stock')->where('id', $request->id)->update(array('id_lok' => $request->value)); 
            if($hasil==1){
                if(!empty($idlocks)){
                $data1 = \   DB::table('master_lokasi')  
                ->where('master_lokasi.id', '=', $data->id_lok)
                ->first();  
                if(!empty($data1->terpakai)){
                    $tot = $data1->terpakai-$request->qty; 
                     }
                     else{
                        $tot = $request->qty;
                     }
                $hasil1 = \ DB::table('master_lokasi')->where('id', $data->id_lok)->update(array('terpakai' => $tot)); 
                    }
                $data2 = \   DB::table('master_lokasi')  
                ->where('master_lokasi.id', '=', $request->value)
                ->first(); 
                $tot1 = $data2->terpakai+$request->qty;
                $hasil2 = \ DB::table('master_lokasi')->where('id', $request->value)->update(array('terpakai' => $tot1)); 
               if($hasil2==1){
                $data='Berhasil Ubah Lokasi dan ubah terpakai di master lokasi!';
               }
               else{
                $data='Berhasil Ubah Lokasi gagal update terpakai lokasi!';
               }
        
                
            }
            else{
                $data='gagal Update !';
            }
            }
      
        else{
            $data='gagal coba ulangi';
        }

        return $data;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user   = User::find($id);
        $log    = LogModel::all();
        //dd($log);
        $cabang = CabangModel::all();
        return view('akun.edit', compact('user', 'cabang', 'log'));
    }
    public function downloadImage($filename)
    {
        return response()->download(public_path('/qrcode/' . $filename.'.png'));
        
    }
        public function buat(Request $request)
    {

        //dd($request->uom);
        $date   = new DateTime();
        $auth = Auth::user()->email; //dd($auth);

        $hasil = \ DB::table('stock_move')->where('id', $request->id)->update(array('x_kartu' => 1)); 
        
        if($hasil ==1){
          //  echo 'berhasil';
            $insert = \ DB::table('kartu_stock')->insert(
                ['idbpj' => $request->IDstock, 'product_id' => $request->product_id,
                'nama_barang' => $request->nama, 'default_code' => $request->default_code,
                'productionlot' => $request->productionlot, 'qty' => $request->uom,'kategori_barang' => $request->kat,'id_stockmove' => $request->id, 'qty_gerak' => $request->uom
                , 'created_date' => $date, 'created' => $auth, 'uom' =>$request->uomname]
                  ); 
$reff_id = DB::getPdo()->lastInsertId();

$reff_id1 =url('akun/detailkartu/'.$reff_id);//dd($reff_id);

$generateqrcode = QrCode::size(100)
        ->format('png')
        ->generate($reff_id1, public_path('qrcode/'.$request->productionlot.'.png'));


// $reff_id1 =url('akun/detaillot/'.$request->productionlot);//dd($reff_id);

// $generateqrcode = QrCode::size(100)
//         ->format('png')
//         ->generate($reff_id1, public_path('qrcode/'.$request->productionlot.'.png'));
}else{
            $insert ='gagal';
        }//exit();
          //dd($insert);

          return json_encode($insert);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['password'] = Hash::make($request->password);
        User::find($id)->update($request->all());
        return redirect(route('akun.index'))->with('pesan', 'berhasil di update');
    }
    public function aktifuser(Request $request, $id)
    {

        $req = User::find($id);
        $req->update([
            'userstatus' => "aktif"
        ]);
        return redirect(route('akun.index'))->with('pesan', 'berhasil di update');
    }
    public function nonaktifuser(Request $request, $id)
    {

        $req = User::find($id);
        $req->update([
            'userstatus' => "nonaktif"
        ]);
        return redirect(route('akun.index'))->with('pesan', 'berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Advance::find($id)->update(['status' => "aktif"]);
        return back()->with('pesan', 'berhasil di hapus');
    }
}
