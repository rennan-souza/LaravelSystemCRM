<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }

  public function listAction(Request $request) {
    $customers = Customer::when(request('search') != null, function ($query) {
      return $query
      ->where('name', 'like', '%' . request('search') . '%')
      ->orWhere('email','like', '%'.request('search').'%')
      ->orWhere('birth_date','like', '%'.request('search').'%')
      ->orWhere('cpf','like', '%'.request('search').'%');
    })->orderBy('id', 'desc')->paginate(5);
    return view('customers/only_list', [
      'customers' => $customers
    ]);
  }

  public function listView() {
    return view('customers/list');
  }

  public function storeView() {
    return view('customers/register');
  }

}
