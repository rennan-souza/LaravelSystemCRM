@extends('layout')

@section('title', 'Produto')

@section('content')
    <div class="text-secondary mb-3">
        <h4>Produto</h4>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="mb-4 text-warning">
              <h2><i class="fas fa-exclamation-triangle"></i> Tem certeza que deseja excluir o produto?</h2>
            </div>
            <div class="mb-4 text-secondary">
              <p>
                <strong>Nome: </strong>{{ $product->name }} <br>
                <strong>Descrição: </strong>{{ $product->description }} <br>
                <strong>Categoria: </strong> <small class="badge badge-info">{{ $product->category->name }}</small> <br>
                <strong>Quantidade: </strong>{{ $product->amount }} <br>
                <strong>Preço: </strong> {{ 'R$ '. number_format($product->price, 2, ',', '.') }} <br>
                <strong>Foto: </strong> <br>
                <img src="{{ asset('http://localhost:8000/assets/productsImages/'.$product->image)}}" alt="Foto" width="100">
              </p>
            </div>  
            <div>
              <a href="{{ url('/produtos/excluir/confirm', ['id' => $product->id]) }}" class="btn btn-danger shadow-none">
                <i class="fas fa-trash-alt"></i>
                EXCLUIR
              </a>
              <a href="{{ url('/produtos') }}" class="btn btn-dark shadow-none">
                <i class="fas fa-times-circle"></i>
                CANCELAR
              </a>
            </div>
        </div>
    </div>
@endsection
