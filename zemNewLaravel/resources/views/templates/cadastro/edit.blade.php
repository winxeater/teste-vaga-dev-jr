 <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}"> 
 <link href="https://fonts.googleapis.com/css?family=Fredoka+One&display=swap" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css" rel="stylesheet">

<section id="cadastro-view" class="view">

        <h1 id="zemis">Zemis</h1>
        <h3 id="vaga">Teste de vaga dev Jr.</h3>

        @if(session('success'))
                <h3>{{ session('sucess')['messages'] }}</h3>
        @else
                <h3>Sem retorno</h3>
        @endif

        {!! Form::model($concorrentes,['route' => ['cadastrar.update', $concorrentes->id] ,'method' => 'put', 'class' => 'form-cadastro']) !!}

        <p id="cadastre">Atualize os concorrentes aqui!</p>

        @include('templates.formulario.input', ['label' => 'Nome: ', 'input' => 'name', 'attributes' => ['placeholder' => 'Nome']])
        @include('templates.formulario.input', ['label' => 'E-mail: ', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
        @include('templates.formulario.input', ['label' => 'Telefone: ', 'input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
        @include('templates.formulario.input', ['label' => 'Data de nascimento: ', 'input' => 'date', 'attributes' => ['placeholder' => ' ___ / ___ / ___']])
        @include('templates.formulario.checkbox', ['label' => 'Cursando faculdade?', 'input' => 'facul'])
        @include('templates.formulario.input', ['label' => 'Salário: ', 'input' => 'pretsalarial', 'attributes' => ['placeholder' => 'Pretenção salarial']])
        @include('templates.formulario.checkbox', ['label' => 'Marcar', 'input' => 'marcar'])
        @include('templates.formulario.input', ['label' => 'Habilidades e competências: ', 'input' => 'habilidades', 'attributes' => ['placeholder' => '']])
        
        
        @include('templates.formulario.submit', ['input' => 'Atualizar'])


        {!! Form::close() !!}
</section>
