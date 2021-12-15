@extends('layout')

@section('title', 'Cliente')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="mb-4 text-warning">
              <h2><i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja excluir o cliente?</h2>
            </div>
            <div class="mb-4 text-secondary">
              <p>
                <strong>Nome: </strong>{{ $customer->name }} <br>
                <strong>CPF: </strong>{{ $customer->cpf }} <br>
                <strong>Data de nascimento: </strong>{{ date('d/m/Y', strtotime($customer->birth_date)) }} <br>
                <strong>Telefone: </strong>{{ $customer->phone }} <br>
                <strong>Email: </strong>{{ $customer->email }} <br>
              </p>
            </div>  
            <div>
              <a href="{{ url('/clientes/excluir/confirm', ['id' => $customer->id]) }}" class="btn btn-danger btn-sm">
                <i class="fas fa-trash-alt"></i>
                EXCLUIR
              </a>
              <a href="{{ url('/clientes') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-times-circle"></i>
                CANCELAR
              </a>
            </div>
        </div>
    </div>
@endsection
