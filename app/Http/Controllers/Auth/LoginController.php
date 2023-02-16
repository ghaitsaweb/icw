<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated()
    {
        if ( Auth::user()->hak_akses == 'Create' ) {
            return redirect(route('adjust.create'));
        }
        else if ( Auth::user()->hak_akses == 'Aprove' ) {
            return redirect(route('adjust.create'));
        }
        else if ( Auth::user()->hak_akses == 'Finance' ) {
            return redirect(route('finance.index'));
        }
        else if ( Auth::user()->hak_akses == 'Supplychain' ) {
            return redirect(route('supplychain.index'));
        }
        else if ( Auth::user()->hak_akses == 'RnD' ) {
            return redirect(route('rnd.index'));
        }
        return redirect('/');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');//dd($credentials);
        $credentials['userstatus'] = 'aktif';

        return $credentials;
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


}
