@extends('layouts.dep')

@section('content')

<h2 class="text-center mb-4">Editar Actividad</h2>

<form method="POST" action="{{ route('actividad.update', $actividad->id_actividad_pk) }}" enctype="multipart/form-data" novalidate>
    @csrf
     @method('PUT')
        <div class="form-row justify-content-center">

          <div class="form-group col-md-4">
            <label for="nombre">Nombre*</label>
            <input type="text"
            name="nombre" class="form-control @error('nombre')is-invalid @enderror"
            id="nombre" value="{{$actividad->nombre_actividad}}" placeholder="ingrese nombre de la Actividad"/>

            @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-row justify-content-center">
          <div class="form-group col-md-4">
            <label for="numero_dictamen">Numero del Dictamen*</label>
            <input type="number"
            name="numero_dictamen" class="form-control @error('numero_dictamen')is-invalid @enderror"
            id="numero_dictamen" value="{{$actividad->numero_dictamen}}" placeholder="ingrese numero del dictamen"/>

            @error('numero_dictamen')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group col-md-4">
            <label for="creditos">credito(s)*</label>
            <input type="number"
            name="creditos" class="form-control @error('creditos')is-invalid @enderror"
            id="creditos" value="{{$actividad->creditos}}" placeholder="ingrese credito(s)"/>

            @error('creditos')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
        </div>
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
              <label for="capacidad_alumnos">Capacidad Alumnos*</label>
              <input type="number"
              name="capacidad_alumnos" class="form-control @error('capacidad_alumnos')is-invalid @enderror"
              id="capacidad_alumnos" value="{{$actividad->capacidad_alumnos}}" placeholder="ingrese capacidad de alumnos"/>
              @error('capacidad_alumnos')
              <span class="invalid-feedback d-block" role="alert">
                  <strong>{{$message}}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="id_area">Area</label>
              <select
                  name="id_area"
                  class="form-control @error('id_area') is-invalid @enderror"
                  id="id_area"
               >
                  <option value="">-- Seleccione Area*--</option>
                  @foreach ($areas as $area)
                      <option
                          value="{{ $area->id_area_pk }}"
                          {{ $actividad->id_area_fk== $area->id_area_pk ? 'selected' : '' }}
                      >{{$area->nombre_area}}</option>                      <!-- cambiar para que solo aparesca el rfc -->
                  @endforeach
              </select>

              @error('id_area')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{$message}}</strong>
                  </span>
              @enderror
               </div>
          </div>

          <div class="form-row justify-content-center">
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
                          {{$actividad->id_periodo_fk== $periodo->id_periodo_pk ? 'selected' : '' }}
                      >{{$periodo->nombre_periodo}}</option>                      <!-- cambiar para que solo aparesca el rfc -->
                  @endforeach
              </select>

              @error('id_periodo')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{$message}}</strong>
                  </span>
              @enderror
               </div>

               <div class="form-group col-md-4">
                <label for="responsable">Responsable</label>

              <select
                  name="responsable"
                  class="form-control @error('responsable') is-invalid @enderror"
                  id="responsable"
               >
                  <option value="">-- Seleccione Responsable--</option>
                  @foreach ($responsables as $responsable)
                      <option
                          value="{{ $responsable->rfc_responsable_pk }}"
                          {{$actividad->id_periodo_fk== $responsable->rfc_responsable_pk ? 'selected' : '' }}
                      >{{$responsable->rfc_responsable_fk}}</option>                      <!-- cambiar para que solo aparesca el rfc -->
                  @endforeach
              </select>

              @error('responsable')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{$message}}</strong>
                  </span>
              @enderror
               </div>
          </div>

    <div class="form-group justify-content-center row">
        <a href="{{route('actividad.index')}}" class="btn btn-danger mr-2">Cancelar</a>
        <input type="submit" class="btn btn-success" value="Actualizar">
    </div>

</form>

@endsection
