@extends('layout')

@section('title', 'Editar produto')

@section('content')
    <div class="text-secondary mb-3">
        <h4>Editar produto</h4>
    </div>

    <div class="mb-2">
        <a href="{{ url('/produtos') }}" class="link">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Voltar
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/produtos/editar') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" value="{{ $product->id }}" name="id">

                <div class="form-group">
                    <img id="preview-image-before-upload" src="{{ asset('http://localhost:8000/assets/productsImages/').$product->image }}" alt="Foto" width="200">
                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Selecione uma imagem para o produto:</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div>


                <div class="form-group">
                    <label>Nome:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $product->name }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" rows="3"
                        name="description">{{ $product->description }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Selecione a categoria</label>
                    <select class="form-control @error('category') is-invalid @enderror" name="category">
                        <option></option>
                        @foreach ($categories as $c)
                            <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
                                {{ $c->name }}</option>
                        @endforeach
                    </select>
                    @error('category') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Preço:</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                        value="{{ $product->price }}">
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                    <label>Quantidade:</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" name="amount"
                        value="{{ $product->amount }}">
                    @error('amount') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mt-3">
                    <button class="btn btn-success shadow-none" id="submit">
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
