<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestModel;
use Auth;
class DeveloperController extends Controller
{
    //
    public function index()
    {

            $request = RequestModel::where('status','waiting developer')->orWhere('status','proses developer')
            ->orderby('id','desc')->get();


        return view('infra/index',compact('request'));
    }
    public function solved($id)
    {
        $req = RequestModel::find($id);
        $req->update(['status' => "solved",'tgl_solved' => now()]);
        return redirect(route('developer.index'))->with('pesan','berhasil di solved');
    }

    public function rejected(Request $request,$id)
    {
        $req = RequestModel::find($id);
        $req->update(['status' => "approved",
        'tgl_rejected' => now(),
        'rejectchiefstore'=>Auth::user()->name,
        'reasonreject' => $request ->solved]);
        return redirect(route('developer.index'))->with('pesan','telah di reject');
    }
}
