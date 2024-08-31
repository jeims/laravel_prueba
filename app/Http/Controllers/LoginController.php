<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public  function index () {
        return view('auth.login');
   }

 
     public  function store(Request $request) {
 
        //Validacion
        $request->validate([ 
            'email' => 'required|email',
            'password' => 'required|min:6',


        ]);



        if (!Auth::attempt($request->only('email', 'password'))) {
       
              return back()-> with('mensaje' ,'Credenciales Incorrectas');
        }

          return redirect()->route('home.index', [$request->user()->name]);



     }

}
