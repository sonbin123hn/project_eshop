<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
     * Where to redirect users after login. //chu y doc tieng anh, dong nay nghia la sau khi lohin no se cchyen toi trang ben duoi
     *
     * @var string
     */
    //nghia la dau tien khi login vao dc admin thi cho vao trang nay luon
    protected $redirectTo = "admin/dashboard";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
    
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/admin/login'); //giominh pai chinh sua lai ham nayu 1 chut, bang cach them admin vao
      }
}
