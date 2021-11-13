<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crie sua nova senha</title>

</head>

<body style="font-family: Arial, Helvetica, sans-serif;">

    <h1>System CRM</h1>

    <p>
        Olá {{ $variables['name'] }},
        recebemos uma solicitação de redefinição de senha de acesso ao System CRM,
        essa solicitação ocorreu em {{ $variables['created_at'] }} e para sua segurança o
        link de redefinição de senha tem válidade de 60 minutos.
    </p>
    <p>
      <strong>Se você reconhece essa ação, clique no link para prosseguir</strong>
    </p>

    <a href="{{ url('nova-senha', ['token' => $variables['token']]) }}">
        CRIAR NOVA SENHA
    </a>

    <h3>ATENÇÃO</h3>
    <p><strong>Se não reconhece essa ação somente desconsidere esse email.</strong></p>


</body>

</html>
