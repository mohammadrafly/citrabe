<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        if ($request->session()->has('_usr')) {
            return redirect( url('/') );    
        }

        return view('layouts.login');
    }

    public function do_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'userpassword' => 'required',
        ]);
   

        $user = User::where('username', $request->input('username'))->where('aktif', '1')->first();
        if( $user )
        {
            if ( \Hash::check($request->input('userpassword'), $user->userpassword))
            {
                #return \Redirect::back()->withSuccess(['message', 'You are login successfully']);
                #create session login
                session(['_usr' => json_encode($user)]);
                return redirect( url('') )->withSuccess(['message', 'You are login successfully']);

            }else{
                return back()->withInput()->with('error_message', 'Invalid Username\Password!');
            }
            
        }else{
            return back()->withInput()->with('error_message', 'Invalid Username\Password!');
        }
        
    }

    public function logout(Request $request) {
        #\Session::flush();
        $request->session->forget('_usr');
        return redirect( url('login') );
    }


}
