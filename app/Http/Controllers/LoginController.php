<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
   
    public function showLogin(Request $request)
    {
      //dans la méthode en post, vérifie le verb HTTP
      if( $request->isMethod('post') == true)
      {
        // dump($request->all());
        
        $this->validate($request,[
          		'email' => 'required|email',
          		'password' => 'required'
          ]);
        // récupérer en même temps les champs email et password
        $credentials = $request->only('email', 'password');
        
        $remember = true;
        
        // Auth classe de Laravel 
        if(Auth::attempt($credentials, $remember))
        {
          
           return redirect()->intended('dashboard/profile'); // redirection vers la page profile faites cette route 
        }else{
          
          return back()->withInput($request->only('email')); // redirige vers l p
        }
        

      }

        return view('auth.login');
    }


    public function loginOut()
    {
      
    }
}
