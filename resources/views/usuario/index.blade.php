@extends('layouts.admin')

@section('content')

 <a href="{{route('usuario.create')}}" class="btn btn-primary mr-4">añadir</a>

<h2 class="text-center mb-5">Usuarios</h2>

<div class="conteiner">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table text-center">
                <thead class="bg-primary text-light">
                  <tr>
                    <th scole="col">usuario</th>
                    <th scole="col">contraseña</th>
                    <th scole="col">id tipo</th>
                    <th scole="col">id area</th>
                    <th scole="col">estatus</th>

                  </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach ($usuarios as $usuario)

                    <td>{{ $usuario->usuario_pk }}</td>
                    <td>{{ $usuario->password }}</td>
                    <td>{{$usuario->id_tipo_fk}}
                    </td>
                    <td>{{ $usuario->id_area_fk}}</td>
                    <td>{{ $usuario->estatus}}</td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>

    </div>
     {{ $usuarios->links() }}
</div>

@endsection
