@extends('layouts.dep')

@section('content')

<h2 class="text-center mb-4">Inscripcion</h2>


 <form method="POST" action="{{route('inscripcion.store')}}" novalidate>
    @csrf
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <label for="id_inscripcion">Id inscripcion*</label>
            <input type="number"
            name="id_inscripcion"  class="form-control @error('id_inscripcion')is-invalid @enderror"
            id="id_inscripcion" value="{{old('id_inscripcion')}}" placeholder="ingrese id "/>

            @error('id_inscripcion')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
           </div>

          <div class="form-group col-md-4">
            <label for="num_control">Numero de control*</label>
            <input type="number"
            name="num_control" class="form-control @error('num_control')is-invalid @enderror"
            id="num_control" value="{{old('num_control')}}" placeholder="ingrese numero control"/>

            @error('num_control')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-row justify-content-center">
          <div class="form-group col-md-4">
            <label for="fecha_inscripcion">Fecha de inscripcion*</label>
            <input type="date"
            name="fecha_inscripcion" class="form-control @error('fecha_inscripcion')is-invalid @enderror"
            id="fecha_inscripcion" value="{{old('fecha_inscripcion')}}" placeholder="ingrese fecha de inscripcion"/>

            @error('fecha_inscripcion')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="id_periodo">Periodo*</label>
          <select
              name="id_periodo"
              class="form-control @error('id_periodo') is-invalid @enderror"
              id="id_periodo"
           >
              <option value="">-- Seleccione Periodo*--</option>
              @foreach ($periodos as $periodo)
                  <option
                      value="{{ $periodo->id_periodo_pk }}"
                      {{ old('id_periodo') == $periodo->id_periodo_pk ? 'selected' : '' }}
                  >{{$periodo->nombre_periodo}}</option>                      <!-- cambiar para que solo aparesca el rfc -->
              @endforeach
          </select>

          @error('id_periodo')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{$message}}</strong>
              </span>
          @enderror
           </div>
        </div>

        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <label for="id_actividad"> id actividad</label>
              <select
                  name="id_actividad"
                  class="form-control @error('id_actividad') is-invalid @enderror"
                  id="id_actividad"
               >
                  <option value="">-- Seleccione Actividad*--</option>
                  @foreach ($actividades as $actividad)
                      <option
                          value="{{ $actividad->id_actividad_pk }}"
                          {{ old('id_actividad') == $actividad->id_actividad_pk ? 'selected' : '' }}
                      >{{$actividad->nombre_actividad}}</option>                      <!-- cambiar para que solo aparesca el rfc -->
                  @endforeach
              </select>

              @error('id_actividad')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{$message}}</strong>
                  </span>
              @enderror
               </div>
          </div>
            <div class="form-group justify-content-center row">
                <a href="{{route('inscripcion.index')}}" class="btn btn-danger mr-2">cancelar</a>
                <input type="submit" class="btn btn-success" value="Agregar">
            </div>
</form>

@endsection

