<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UploadController extends Controller
{
    public function index()
    {

        $request = RequestModel::orderby('id','desc')->get();

        return view('upload/index');
    }

}
