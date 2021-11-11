<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

  public function storeAction(Request $request) {

    $data = $request->only([
      'name',
      'cpf',
      'birth_date',
      'phone',
      'email'
    ]);

    $validator = Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'cpf' => ['required', 'string', 'max:255', 'unique:customers'],
      'birth_date' => ['required'],
      'phone' => ['required'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
    ]);

    if($validator->fails()) {
      return redirect('clientes/cadastrar')
          ->withErrors($validator)
          ->withInput();
    }

    $customer = new Customer;
    $customer->name = $data['name'];
    $customer->cpf = $data['cpf'];
    $customer->birth_date = $data['birth_date'];
    $customer->phone = $data['phone'];
    $customer->email = $data['email'];
    $customer->save();

    return redirect('/clientes')
      ->with('success', 'Cliente cadastrado com sucesso');
  }

  public function editView($id) {

    $customer = Customer::find($id);

    return view('customers/edit', [
      'customer' => $customer
    ]);
  }

  public function editAction(Request $request) {

    $data = $request->only([
      'id',
      'name',
      'cpf',
      'birth_date',
      'phone',
      'email'
    ]);

    $validator = Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'cpf' => ['required', 'string', 'max:255', Rule::unique('customers')->ignore($data['id'])],
      'birth_date' => ['required'],
      'phone' => ['required'],
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique('customers')->ignore($data['id'])],
    ]);

    if($validator->fails()) {
      return redirect('clientes/editar/'.$data['id'])
          ->withErrors($validator)
          ->withInput();
    }

    $customer = Customer::find($data['id']);

    $customer->name = $data['name'];
    $customer->cpf = $data['cpf'];
    $customer->birth_date = $data['birth_date'];
    $customer->phone = $data['phone'];
    $customer->email = $data['email'];
    $customer->save();

    return redirect('/clientes')
      ->with('success', 'Cliente editado com sucesso');
  }

  public function deleteView($id) {

    $customer = Customer::find($id);

    return view('customers/delete', [
      'customer' => $customer
    ]);
  }

  public function deleteAction($id) {
    Customer::find($id)->delete();
    return redirect('/clientes')
      ->with('success', 'Cliente excluído com sucesso');
  }
}
