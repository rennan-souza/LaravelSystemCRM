<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>System CRM</title>

</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
  
    <h1>System CRM</h1>

    <p>
      Olá {{ $variables['name'] }}, esses são os seus dados de acesso ao System CRM.
    </p>

    <p>
        Recomendamos que após o seu primeiro login você altere a senha para uma de sua própria preferência.
    </p>

    <p>
        <strong>Email: </strong> {{ $variables['email'] }} <br>
        <strong>Senha: </strong> {{ $variables['provisional_password'] }}
    </p>

</body>
</html>