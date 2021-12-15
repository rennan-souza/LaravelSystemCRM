@extends('layout')

@section('title', 'Clientes')

@section('content')

    <div class="card">
        <div class="card-body page-title-container">
            <h4>Clientes</h4>
            <a href="{{ url('clientes/cadastrar')}}" class="btn btn-sm btn-primary">Cadastrar novo</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/clientes') }}" method="GET" id="form">
                <div class="search-container">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="Pesquisar">
                    <input type="hidden" id="page" name="page" value="0">
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="add-table">
        
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            getTable(0);
        });

        $(document).on('click', '.btn-pagination', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('page=')[1];
            getTable(page);
        });

        $(document).on('keyup submit', '#form', function(e) {
            e.preventDefault();
            getTable(0)
        });

        function getTable(page) {
            $('#page').val(page);
            var data = $('#form').serialize();

            $.ajax({
                url: '{{ url('/clientes/ajax') }}',
                method: 'GET',
                data: data
            }).done(function(data) {
                $('.add-table').html(data);
            });
        }
    </script>

@endsection
