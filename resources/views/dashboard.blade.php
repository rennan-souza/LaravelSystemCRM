@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">System CRM</h1>
        <p class="lead mt-4">Sistema para gestão de usuários, clientes e produtos</p>
        <hr class="my-4">
        <p><strong>Informações do usuário logado</strong></p>

        <small><strong>Nome: </strong>{{ Auth::user()->name }}</small> <br>
        <small><strong>Email: </strong>{{ Auth::user()->email }}</small> <br>
        <small>
          <strong>Perfis: </strong>
          @foreach (Auth::user()->roles as $r)
              <span class="badge badge-info">{{ $r->name }}</span>
          @endforeach
        </small>
    </div>
@endsection
