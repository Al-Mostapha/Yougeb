<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function login(Request $request){
        $data = $request->all();
        $request->validate([
            'userMail' => ['required', 'string', 'email', 'max:255'],
            'userPass' => ['required', 'string', 'min:8'],
        ]);
        $credentials = $request->only('userMail', 'userPass');
        if (Auth::attempt(["email" => $credentials["userMail"], "enc_pass" => $credentials["userPass"]])) {
            $request->session()->regenerate();
            return redirect()->intended('home');
        }

        return [
            "state" => "error_email"
        ];
    }
}
