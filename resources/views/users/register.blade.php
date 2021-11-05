@extends('layout')

@section('title', 'Cadastrar usuário')

@section('content')
    <div class="text-secondary mb-3">
        <h4>Cadastrar usuário</h4>
    </div>

    <div>
        <a href="{{ url('/usuarios') }}" class="link">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Voltar
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/usuarios/cadastrar') }}" method="POST">
                @csrf

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
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
                    @error('roles') <small class="text-danger">Selecione pelo menos um perfil</small> @enderror
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
