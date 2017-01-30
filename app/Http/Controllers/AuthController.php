<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

use Illuminate\Support\Facades\Input;

class AuthController extends Controller
{
    public function get_login(Request $request)
    {

        if($request->isMethod('post')) {

            $this->validate($request,[

                'email' => 'required',
                'password' => 'required',
            ]);


            $data = $request->only('email','password');

            if(Auth::attempt($data)) {

                return redirect('admin');

            } else {

                return back()->withInput(Input::except('password'))->with('status', 'Неправильные данные');

            }

        }

        return view('auth.login');

    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('home');
    }
}
