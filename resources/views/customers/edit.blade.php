@extends('layout')

@section('title', 'Editar usuário')

@section('content')
    <div class="text-secondary mb-3">
        <h4>Editar cliente</h4>
    </div>

    <div class="mb-2">
        <a href="{{ url('/clientes') }}" class="link">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Voltar
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/clientes/editar') }}" method="POST">
                @csrf

                <input type="hidden" name="id" value="{{ $customer->id }}">
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $customer->name }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>CPF:</label>
                    <input type="text" class="form-control @error('cpf') is-invalid @enderror" name="cpf"
                        value="{{ $customer->cpf }}">
                    @error('cpf') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Data de nascimento:</label>
                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date"
                        value="{{ $customer->birth_date }}">
                    @error('birth_date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Telefone:</label>
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ $customer->phone }}">
                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $customer->email }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

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
