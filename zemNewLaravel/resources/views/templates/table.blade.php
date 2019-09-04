 <!-- imports bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
 
 
 <table class="table table-hover table-dark" id="table">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">E-mail</th>
            <th scope="col">Telefone</th>
            <th scope="col">Nascimento</th>
            <th scope="col">Pret. Salarial</th>
            <th scope="col">Curs. Faculdade</th>
            <th scope="col">Habil. & Compet.</th>
            <th scope="col" class="text-center">ICONE</th>
            
        </tr>
    </thead>
    <tbody>
{{-- 'name', 'email', 'phone', 'birth', 'marcar', 'facul', 'salarial', 'habilidades',  --}}
        @foreach ($concorrentes as $concorrente)
        @if ($concorrente->marcar == '1') {{$classe = "bg-success"}}
        <tr class="{{$classe}}">
        @endif
            <th scope="row"></th>
            <td>{{ $concorrente->name }}</td> 
            <td>{{ $concorrente->email }}</td>
            <td>{{ $concorrente->phone }}</td>
            <td>{{ $concorrente->birth }}</td>
            <td>{{ $concorrente->salarial }}</td>
            <td>{{ $concorrente->facul }}</td>
            <td>{{ $concorrente->habilidades }}</td>
            <td class="text-center">
                <div class="form-group row">
                
                    <a href="{{ route('cadastrar.edit', $concorrente->id) }}"><button type="button" class="btn btn-warning"><i class="fas fa-user-edit"></i></i></button></a>

                    {!! Form::open(['route' => ['cadastrar.destroy', $concorrente->id], 'method' => 'DELETE']) !!} 
                    {{-- {!! Form::submit(' --}}
                    <button type="submit" class="btn btn-danger"><i class="fas fa-user-slash"></i></button>
                    {{-- ') !!} --}}
                    {!! Form::close() !!}
                </div>
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>