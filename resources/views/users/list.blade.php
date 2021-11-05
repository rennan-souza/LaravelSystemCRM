@extends('layout')

@section('title', 'Dashboard')

@section('content')
    <div class="text-secondary mb-3">
        <h4>Usuários</h4>
    </div>

    <div class="mb-2">
        <button class="btn btn-success shadow-none">
            <i class="fas fa-plus"></i>
            NOVO
        </button>
    </div>

    <form action="{{ url('/usuarios') }}" method="GET" id="form">
        <div class="mb-2" style="width: 250px;">
            <input type="text" class="form-control shadow-none" name="search" placeholder="Pesquisar">
            <input type="hidden" id="page" name="page" value="0">
        </div>
    </form>

    <div class="card">
        <div class="table-responsive">

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            getTable(0);
        });

        $(document).on('click', '.page-link', function(e) {
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
                url: '{{ url('/usuarios/ajax') }}',
                method: 'GET',
                data: data
            }).done(function(data) {
                $('.table-responsive').html(data);
            });
        }
    </script>

@endsection