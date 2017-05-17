<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login(Request $request)
    {
        if($request->input('username') && $request->input('password')) {
            $file = \Storage::get('users.txt');

            $pos = strpos($file, $request->input('username').'###'.md5($request->input('password')));

            if($pos) {
//                \Auth::login(\Auth::)
                if (\Auth::attempt(['email' => $email, 'password' => $password])) {
                    // Authentication passed...
                    return redirect()->intended('dashboard');
                }
            }
        }

    }
}
