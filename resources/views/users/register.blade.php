@extends('layout')

@section('title', 'Cadastrar usuário')

@section('content')

    <div class="card">
        <div class="card-body page-title-container">
            <h4>Cadastrar usuário</h4>
            <a href="{{ url('/usuarios') }}" class="btn btn-sm btn-primary">Voltar</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/usuarios/cadastrar') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label>Perfis:</label>
                    @foreach ($roles as $r)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $r->id }}"
                                {{ in_array($r->id, old('roles', [])) ? 'checked' : '' }}>
                            <label class="form-check-label">
                                {{ $r->name }}
                            </label>
                        </div>
                    @endforeach
                    @error('roles') <small class="text-danger">Selecione pelo menos um perfil.</small> @enderror
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
