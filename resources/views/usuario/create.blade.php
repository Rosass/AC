@extends('layouts.admin')

@section('content')

<h2 class="text-center mb-5">Agregar Usuario</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <form method="POST" action="{{route('usuario.store')}}" novalidate>
    @csrf
      <div class="form-row justify-content-center">
            <div class="form-group col-md-4">

               <input type="text" name="usuario_pk"  class="form-control @error('usuario_pk')is-invalid @enderror"
               id="usuario_pk" value="{{old('usuario_pk')}}" placeholder="ingrese usuario"  required autocomplete="usuario_pk" autofocus/>

               @error('usuario_pk')
               <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
              </span>
               @enderror
             </div>

          <div class="form-group col-md-4">
            <input type="password" name="password" class="form-control @error('password')is-invalid @enderror"
            id="password" value="{{old('password')}}" placeholder="ingrese contraseña"/>

            @error('password')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
      </div>

        <div class="form-row justify-content-center">
          <div class="form-group col-md-4">
              <label for="id_tipo"> id tipo</label>

            <select
                name="id_tipo"
                class="form-control @error('id_tipo') is-invalid @enderror"
                id="id_tipo"
             >
                <option value="">-- Seleccione Tipo --</option>
                @foreach ($tipos as $tipo)
                    <option
                        value="{{ $tipo->id_tipo_pk }}"
                        {{ old('id_tipo') == $tipo->id_tipo_pk ? 'selected' : '' }}
                    >{{$tipo->nombre_tipo}}</option>                      <!-- cambiar para que solo aparesca el rfc -->
                @endforeach
            </select>

            @error('id_tipo')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
           </div>

          <div class="form-group col-md-4">
            <label for="id_area"> id area</label>

          <select
              name="id_area"
              class="form-control @error('id_area') is-invalid @enderror"
              id="id_area"
           >
              <option value="">-- Seleccione Area--</option>
              @foreach ($areas as $area)
                  <option
                      value="{{ $area->id_area_pk }}"
                      {{ old('id_area') == $area->id_area_pk ? 'selected' : '' }}
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
        <div class="justify-content-center form-group row">
              <input type="submit" class="btn btn-success " value="agregar">
              <input type="reset" class="btn btn-primary " value="limpiar">
        </div>
</form>
        <div class="mt-5 col-12">
            <a href="{{route('usuario.index')}}" class="btn btn-primary mr-2">regresar</a>
        </div>
@endsection
