@extends('layout')

@section('title', 'Usuário')

@section('content')
    <div class="text-secondary mb-3">
        <h4>Usuário</h4>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-4 text-warning">
              <h2><i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja excluir o usuário?</h2>
            </div>
            <div class="mb-4 text-secondary">
              <p>
                <strong>Nome: </strong>{{ $user->name }} <br>
                <strong>Email: </strong>{{ $user->email }} <br>
                <strong>Perfis: </strong> 
                  @foreach ($user->roles as $r)
                    <small class="badge badge-info">{{ $r->name }}</small>
                  @endforeach
              </p>
            </div>  
            <div>
              <a href="{{ url('/usuarios/excluir/confirm', ['id' => $user->id]) }}" class="btn btn-danger shadow-none">
                <i class="fas fa-trash-alt"></i>
                EXCLUIR
              </a>
              <a href="{{ url('/usuarios') }}" class="btn btn-dark shadow-none">
                <i class="fas fa-times-circle"></i>
                CANCELAR
              </a>
            </div>
        </div>
    </div>
@endsection
