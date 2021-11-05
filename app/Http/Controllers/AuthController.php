<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function signinView() {
      return view('auth/signin');
    }

    public function signinAction(Request $request) {

      $data = $request->only('email', 'password');

      if(Auth::attempt($data)) {
        return redirect('dashboard');
      } 

      return redirect('login')
        ->with('danger', 'E-mail e ou senha inválidos');
    } 

    public function logout() {
      Auth::logout();
      return redirect('login');
    }
}
