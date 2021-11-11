@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Acesso negado!</h1>
        <p class="lead mt-4">Você não tem permissão para acessar essa área.</p>
        <hr class="my-4">
        <a class="btn btn-primary btn-lg" href="{{ url('/dashboard')}}" role="button">
          <i class="fas fa-arrow-alt-circle-left"></i>
          VOLTAR
        </a>
    </div>
@endsection
