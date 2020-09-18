@extends('layouts.dep')

@section('content')

<h2 class="text-center mb-4">Editar Periodo</h2>

<form method="POST" action="{{ route('periodo.update', $periodo->id_periodo_pk) }}" enctype="multipart/form-data" novalidate>
    @csrf
     @method('PUT')
        <div class="form-row justify-content-center">

          <div class="form-group col-md-4">
            <label for="nombre">Nombre*</label>
            <input type="text"
            name="nombre" class="form-control @error('nombre')is-invalid @enderror"
            id="nombre" value="{{$periodo->nombre_periodo}}" placeholder="ingrese nombre del periodo"/>

            @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-row justify-content-center">
          <div class="form-group col-md-4">
            <label for="fecha_inicio">Fecha de Inicio*</label>
            <input type="date"
            name="fecha_inicio" class="form-control @error('fecha_inicio')is-invalid @enderror"
            id="fecha_inicio" value="{{$periodo->fecha_inicio}}" placeholder="ingrese fecha de inicio"/>

            @error('fecha_inicio')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="fecha_final">Fecha Final</label>
            <input type="date"
            name="fecha_final" class="form-control @error('fecha_final')is-invalid @enderror"
            id="fecha_final" value="{{$periodo->fecha_final}}" placeholder="ingrese fecha final"/>

            @error('fecha_final')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
        </div>

    </div>

    <div class="form-group justify-content-center row">
        <a href="{{route('periodo.index')}}" class="btn btn-danger mr-2">Cancelar</a>
        <input type="submit" class="btn btn-success" value="Actualizar">
    </div>
</div>

</form>

@endsection
