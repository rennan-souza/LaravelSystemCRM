<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
