@extends('layout')

@section('title', 'Cadastrar usuário')

@section('content')
    <div class="text-secondary mb-3">
        <h4>Cadastrar clientes</h4>
    </div>

    <div class="mb-2">
        <a href="{{ url('/clientes') }}" class="link">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Voltar
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="#" method="POST">
                @csrf
                
                
                <div class="mt-3">
                    <button class="btn btn-success shadow-none">
                        <i class="fas fa-save"></i>
                        SALVAR
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
