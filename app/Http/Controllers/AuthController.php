<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PasswordResetToken;
use App\Mail\SendLinkCreateNewPassword;
use Illuminate\Support\Facades\Mail;

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

    public function recoverPasswordView() {
      return view('auth/recover_password');
    }

    public function recoverPasswordAction(Request $request) {

      $data = $request->only([
        'email'
      ]);

      $validator = Validator::make($data, [
        'email' => ['required', 'string', 'email', 'max:255']
      ]);

      if($validator->fails()) {
        return redirect('esqueci-minha-senha')
            ->withErrors($validator)
            ->withInput();
      }

      $user = User::where('email', $data['email'])->first();

      if (!$user) {
        return redirect('esqueci-minha-senha')
          ->with('success', 'Se o email informado estiver correto, em poucos minutos você receberá o 
          link de redefinição de senha');
      }

      $user_id = $user['id'];
      $token = Str::random(60);
      $created_at = date('Y-m-d H:i:s');
      $expires_at = date('Y-m-d H:i:s', strtotime('+60 minutes'));

      $saveToken = new PasswordResetToken;
      $saveToken->user_id = $user_id;
      $saveToken->token = $token;
      $saveToken->created_at = $created_at;
      $saveToken->expires_at = $expires_at;
      $saveToken->save();

      $token = PasswordResetToken::where('user_id', $user_id)->where('token', $token)->first();

      $dateFormatBR = $token['created_at'] = date('d/m/Y H:i:s', strtotime('-3 hours'));

      $variables = [
          'name' => $user['name'],
          'token' => $token['token'],
          'created_at' => $dateFormatBR,
      ];
      
      Mail::to($user['email'])->send(new sendLinkCreateNewPassword($variables));

      return redirect('esqueci-minha-senha')
        ->with('success', 'Se o email informado estiver correto, em poucos minutos você receberá o 
        link de redefinição de senha');  
    }

    public function resetPasswordView($token) {

      $data = PasswordResetToken::where('token', $token)->where('expires_at', '>', now())->first();

      if($data) {
          return view('auth/create_new_password', [
            'token' => $token
          ]);
      } else {
          return redirect('esqueci-minha-senha')
              ->with('danger', 'Token de redefinição de senha expirado ou inválido, solicite um novo aqui mesmo');
      }
    }

    public function resetPasswordAction(Request $request, $token) {

      $getToken = PasswordResetToken::where('token', $token)->first();

      if(!$getToken) {
        return redirect('esqueci-minha-senha')
              ->with('danger', 'Token de redefinição de senha expirado ou inválido, solicite um novo aqui mesmo');
      }  

        $data = $request->only([
            'password',
            'password_confirmation'
        ]);

        $validator = Validator::make($data, [
            'password' => ['required', 'string', 'min:6', 'max:50', 'confirmed'],
        ]);

        if($validator->fails()) {
            return redirect('nova-senha/'.$token)
                ->withErrors($validator);
        }
          
        $getUserIdByToken = PasswordResetToken::where('token', $token)->first();

        $user = User::where('id', $getUserIdByToken['user_id'])->update([
            'password' => Hash::make($data['password'])
        ]);

        PasswordResetToken::where('token', $token)->first()->delete();

    
        return redirect('login')
            ->with('success', 'Senha alterada com sucesso, Faça login aqui mesmo');
           
  
    }
}
