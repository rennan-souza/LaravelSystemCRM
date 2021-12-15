@extends('layout')

@section('title', 'Cadastrar cliente')

@section('content')

    <div class="card">
        <div class="card-body page-title-container">
            <h4>Cadastrar cliente</h4>
            <a href="{{ url('/clientes') }}" class="btn btn-sm btn-primary">Voltar</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/clientes/cadastrar') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label>CPF:</label>
                        <input type="text" class="form-control form-control-sm @error('cpf') is-invalid @enderror" name="cpf"
                            value="{{ old('cpf') }}">
                        @error('cpf') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Data de nascimento:</label>
                        <input type="date" class="form-control form-control-sm @error('birth_date') is-invalid @enderror" name="birth_date"
                            value="{{ old('birth_date') }}">
                        @error('birth_date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Telefone:</label>
                        <input type="text" class="form-control form-control-sm @error('phone') is-invalid @enderror" name="phone"
                            value="{{ old('phone') }}">
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Email:</label>
                        <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-success btn-sm">
                        <i class="fas fa-save"></i>
                        SALVAR
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
