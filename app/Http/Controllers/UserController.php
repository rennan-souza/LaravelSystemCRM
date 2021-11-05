<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{

  public function __construct() {
    $this->middleware('auth');
  }

  public function listAction(Request $request) {
    $users = User::when(request('search') != null, function ($query) {
      return $query
      ->where('name', 'like', '%' . request('search') . '%')
      ->orWhere('email','like', '%'.request('search').'%');
    })->orderBy('id', 'desc')->paginate(5);
    return view('users/only_list', [
      'users' => $users
    ]);
  }

  public function listView() {
    return view('users/list');
  }

  public function storeView() {
    $roles = Role::all();
    return view('users/register', [
      'roles' => $roles
    ]);
  }

  public function storeAction(Request $request) {

    $data = $request->only([
      'name',
      'email',
      'roles',
    ]);

    $validator = Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'roles' => ['required'],
    ]);

    if($validator->fails()) {
      return redirect('usuarios/cadastrar')
          ->withErrors($validator)
          ->withInput();
    }

    $provisional_password = Str::random(10);

    $user = new User;
    $user->name = $data['name'];
    $user->email = $data['email'];
    $user->password = Hash::make($provisional_password);
    $user->save();
    $user->roles()->attach($data['roles']);

    return redirect('/usuarios/cadastrar')
      ->with('success', 'Usuário cadastrado com sucesso, SENHA: '. $provisional_password);
 
  }

}
