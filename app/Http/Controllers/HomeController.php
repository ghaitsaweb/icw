<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tanggal = RequestModel::where('status','solved')->get();
        foreach($tanggal as $t){
            $date = strtotime("+1 day", strtotime($t->tgl_solved));
            $finaldate = date("Y-m-d", $date);
            $tgl_sekarang = date('Y-m-d');

            if(strtotime($tgl_sekarang)  >= strtotime($finaldate) ){
                $req = RequestModel::find($t->id);
                $timestamp = $now->format('y-m-d H:i:s');
                $req->update(['status' => 'close',
                'tgl_close' => $timestamp]);
            }
        }

        $countall = RequestModel::count();
        $countsolved = RequestModel::where('status','solved')->count();
        $countclosed = RequestModel::where('status','close')->count();
        return view('dashboard',compact('countall','countsolved','countclosed'));
    }
    public function changePasswordForm(Request $request){

        return view('auth.changepassword');

    }
    public function changePassword(Request $request){


        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function getcount(){
        return  RequestModel::where('status','approved')->count();
    }

    public function getcountchiefstore(){
        return  RequestModel::where('status','open')->orWhere('status','rejected')->count();
    }
    public function getcountrnd(){
        return  RequestModel::where('status','waiting rnd')->count();
    }
    public function getcountinfra(){
        return  RequestModel::where('status','waiting infra')->count();
    }
    public function getcountsupplychain(){
        return  RequestModel::where('status','waiting supplychain')->count();
    }
    public function getcountfinance(){
        return  RequestModel::where('status','waiting finance')->count();
    }
}
