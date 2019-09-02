<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
</head>
<body>

    <div class="background">

    </div>

    <section id="conteudo-view" class="view">

        <h1>Zemis</h1>
        <h3>Teste de vaga dev Jr.</h3>

        {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}

        <p>Entre para ver os candidatos!</p>

        <label>
            {!! Form::text('username', null, ['class' => 'input', 'placeholder' => "Usuário"]) !!}
        </label>

        <label>
            {!! Form::password('password', ['placeholder' => "Senha"]) !!}
        </label>

        {!! Form::submit('Entrar') !!}

        {!! Form::close() !!}
    </section>
</body>
</html>