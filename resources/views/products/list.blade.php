@extends('layout')

@section('title', 'Produtos')

@section('content')
    <div class="text-secondary mb-3">
        <h4>Produtos</h4>
    </div>

    <div class="mb-2">
        <a href="{{ url('/produtos/cadastrar') }}" class="btn btn-success shadow-none">
            <i class="fas fa-plus"></i>
            NOVO
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    <form>
      <input type="hidden" id="page" name="page" value="0">
    </form>

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

        function getTable(page) {
            var page = $('#page').val(page);
            $.ajax({
                url: '{{ url('/produtos/ajax') }}',
                method: 'GET',
                data: page
            }).done(function(data) {
                $('.add-table').html(data);
            });
        }
    </script>

@endsection
