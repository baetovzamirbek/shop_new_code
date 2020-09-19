<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Session;
use Hash;
use App;

class AccountController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->session()->get('login') && !$request->session()->get('password')) {
            if ($request->input('email') && $request->input('password')) {
                $email = $request->input('email');
                $password = $request->input('password');
                $userData = App\User::getUsers();
                foreach ($userData as $item) {
                    if ($email == $item->email && Hash::check($password, $item->password)) {
                        $request->session()->put('login', $email);
                        $request->session()->put('password', $password);
                        return view('account', [
                            'login' => $email,
                            'first_name' => $item->first_name,
                            'last_name' => $item->last_name
                        ]);
                    }
                }
            }
            return view('login');
        }
        else {
            if( $data = $this::checkLogin($request))
                return view('account', $data);
            return view('login');
        }
    }

    public function sign(Request $request)
    {
        if($request->session()->get('login') && $request->session()->get('password')){
            if( $data = $this::checkLogin($request))
                return view('account', $data);
        }
        if ($request->input('email_s')) {
            $email = $request->input('email_s');
            $password = $request->input('password_s');
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');

            $userData = App\User::getUsers();
            foreach ($userData as $item) {
                if ($email == $item->email) {
                    return redirect('/account/sign');
                }
            }
            App\User::saveUser($email, $password, $first_name, $last_name);
            $request->session()->put('login', $email);
            $request->session()->put('password', $password);
            return view('account', [
                'login' => $email,
                'first_name' => $first_name,
                'last_name' => $last_name
                ]);
        }
        return view('sign');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('login');
        $request->session()->forget('password');
        return redirect('/account/login');
    }

    public static function checkLogin($request)
    {
        $userData = App\User::getUsers();
        $session_login = $request->session()->get('login');
        $session_password = $request->session()->get('password');
        foreach ($userData as $item) {
            if ($session_login == $item->email && Hash::check($session_password, $item->password)) {
                return  [
                    'login' => $session_login,
                    'first_name' => $item->first_name,
                    'last_name' => $item->last_name
                ];
            }
        }
        return false;
    }
}
