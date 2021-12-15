@extends('layout')

@section('title', 'Cadastrar produto')

@section('content')
    <div class="card">
        <div class="card-body page-title-container">
            <h4>Cadastrar produto</h4>
            <a href="{{ url('/produtos') }}" class="btn btn-sm btn-primary">Voltar</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/produtos/cadastrar') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <img id="preview-image-before-upload" src="" alt="Foto" width="200">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Selecione uma imagem para o produto:</label>
                    <input type="file" name="image" class="form-control form-control-sm" id="image">
                </div>


                <div class="row">
                    <div class="form-group col-lg-12">
                        <label>Nome:</label>
                        <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                    <div class="form-group col-lg-12">
                        <label>Descrição:</label>
                        <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" rows="2"
                            name="description">{{ old('description') }}</textarea>
                        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Selecione a categoria</label>
                        <select class="form-control form-control-sm @error('category') is-invalid @enderror" name="category">
                            <option></option>
                            @foreach ($categories as $c)
                                <option value="{{ $c->id }}" {{ old('category') == $c->id ? 'selected' : '' }}>
                                    {{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Preço:</label>
                        <input type="text" class="form-control form-control-sm @error('price') is-invalid @enderror" name="price" id="price"
                            value="{{ old('price') }}">
                        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="form-group col-lg-4">
                        <label>Quantidade:</label>
                        <input type="number" class="form-control form-control-sm @error('amount') is-invalid @enderror" name="amount"
                            value="{{ old('amount') }}">
                        @error('amount') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <button class="btn btn-success btn-sm" id="submit">
                        <i class="fas fa-save"></i>
                        SALVAR
                    </button>
                </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
                integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script type="text/javascript">

            $('#price').mask('#.##0,00', { reverse: true });

            $(document).ready(function(e) {
              
                $('#image').change(function() {

                    let reader = new FileReader();

                    reader.onload = (e) => {

                        $('#preview-image-before-upload').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(this.files[0]);

                });

            });
        </script>
    </div>
@endsection
