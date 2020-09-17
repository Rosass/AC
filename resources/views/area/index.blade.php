
@extends('layouts.admin')

@section('content')

<a href="{{route('area.create')}}" class="btn btn-primary mr-5">añadir</a>

<h2 class="text-center mb-5">Areas</h2>

<div class="conteiner">
    <div class="row justify-content-center">
        <div class="col-md-8 table-responsive">
            <table class="table text-center">
                <thead class="bg-primary text-light">
                  <tr>
                    <th scope="col">Id del area</th>
                    <th scope="col">Nombre del area</th>
                    <th scope="col">rfc jefe</th>
                    <th scope="col">Estatus</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                    @foreach ($areas as $area)
                    <td>{{$area->id_area_pk}}</td>
                    <td>{{$area->nombre_area}}</td>
                    <td>{{$area->rfc_jefe_fk}}</td>
                    <td>{{$area->estatus}}</td>
                   <!-- para aparesca nombre del jefe del rfc -->
                    <td>
                        <a href="" class="btn btn-success mb-2">Editar</a>
                    </td>
                   </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
