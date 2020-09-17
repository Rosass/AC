@extends('layouts.admin')

@section('content')

 <a href="{{route('tipo_usuario.create')}}" class="btn btn-primary mr-5">añadir</a>

<h2 class="text-center mb-5">Tipos de Usuarios</h2>

<div class="conteiner">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table text-center">
                <thead class="bg-primary text-light">
                  <tr>
                    <th scope="col">Id de tipo</th>
                    <th scope="col">Nombre del tipo</th>


                    <th scope="col">Estatus</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach ($tipos as $tipo)
                    <td>{{$tipo->id_tipo_pk}}</td>
                    <td>{{$tipo->nombre_tipo}}</td>


                   <!-- para aparesca nombre del jefe del rfc -->
                    <td>
                        <a href="" class="btn btn-dark d-block mb-2">Editar</a>
                    </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
