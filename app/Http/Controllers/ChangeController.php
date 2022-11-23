<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Image;
use App\CabangModel;

class ChangeController extends Controller
{
    //
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
}
