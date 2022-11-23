<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CabangModel;
use App\RequestModel;
class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $req    = RequestModel::all();
        $cabang = CabangModel::all();
        return view('cabang.index',compact('req','cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CabangModel::create($request->all());
        return redirect(route('cabang.index'))->with('pesan','berhasil di tambah');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cabang = CabangModel::find($id);
        return view('cabang.edit',compact('cabang'));
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
        $cabang = CabangModel::find($id);
        $cabang->update($request->all());
        return redirect(route('cabang.index'))->with('pesan','berhasil di tambah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CabangModel::find($id)->delete();
        return back()->with('pesan','berhasil di hapus');
    }
}
