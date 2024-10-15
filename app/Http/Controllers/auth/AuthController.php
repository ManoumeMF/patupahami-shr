<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->roleId == '2') {
                return redirect()->intended('admin');
            } elseif ($user->roleId == '3') {
                return redirect()->intended('user');
            }
        }
        return view('auth.login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
            ]
        );

        $kredensil = $request->only('username', 'password');

        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            $userRole = Auth::user()->roles->roleName;

            //dd($user->idJenisUser);

            $userData = DB::select('CALL view_userSessionById(?, ?)', [$user->id, $user->idJenisUser]);

            $request->session()->put('userSession', $userData);

            //dd($userRole);

            if ($userRole == 'Super Admin') {
                //dd($userRole);
                return redirect()->route('Dashboard.index'); 
            }elseif ($userRole == 'Admin') {
                //return redirect()->intended('admin');
                return redirect()->route('Dashboard.index');
            }elseif ($userRole == 'User') {
                return redirect()->intended('user');
            } 
            

            return redirect()->intended('/');
        }

        return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'Username atau Password Anda Salah!']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout(); // user must logout before redirect them
        return redirect()->guest('login');
    }
}