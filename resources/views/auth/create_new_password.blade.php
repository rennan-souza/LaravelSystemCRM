<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">

    <title>System CRM</title>
</head>

<body>

    <div class="auth-container border shadow-sm">
        <div class="auth-logo text-center border-bottom">
            <h2>System CRM</h2>
        </div>
        <div class="auth-title text-center text-secondary">
            <h4>Criar nova senha</h4>
        </div>
        <form action="{{ url('/nova-senha', ['token' => $token]) }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Senha">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
              <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme a nova senha">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block shadow-none"
                    onclick="setLoad()" id="btnSubmit">
                    SALVAR
                </button>
                <button class="btn btn-primary btn-block shadow-none" type="button" disabled id="btnLoad" hidden>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                </button>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="form-group">
                <a href="{{ url('/login') }}">
                    <small>LOGIN</small>
                </a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous">
    </script>

    <script>
        function setLoad() {
            document.getElementById("btnSubmit").hidden = true;
            document.getElementById("btnLoad").hidden = false;
        }
    </script>
</body>

</html>
