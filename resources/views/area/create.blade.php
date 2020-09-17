@extends('layouts.admin')

@section('content')


<h2 class="text-center mb-4">Agregar Area</h2>
 <form method="POST" action="{{route('area.store')}}" novalidate>
    @csrf
    <div class="form-row justify-content-center">
        <div class="form-group col-md-4">
             <label for="rfc_jefe">Id area*</label>
            <input type="text" name="id_area"  class="form-control @error('id_area')is-invalid @enderror"
             id="id_area" value="{{old('id_area')}}" placeholder="ingrese id del area"/>

            @error('id_area')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
        </div>

          <div class="form-group col-md-4">
            <label for="nombre">Nombre*</label>
            <input type="text" name="nombre" class="form-control @error('nombre')is-invalid @enderror"
            id="nombre" value="{{old('nombre')}}" placeholder="ingrese nombre del area"/>

            @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
    </div>
        <div class="form-row mb-3 justify-content-center">
            <div class="form-group col-md-4">
              <label for="rfc_jefe">RFC del jefe*</label>
               <select
                name="rfc_jefe"
                class="form-control @error('rfc_jefe') is-invalid @enderror"
                id="rfc_jefe"
               >
                <option value="">-- Seleccione RFC--</option>
                @foreach ($jefes as $jefe)
                    <option
                        value="{{ $jefe->rfc_jefe_pk }}"
                        {{ old('rfc_jefe') == $jefe->rfc_jefe_pk ? 'selected' : '' }}
                    >{{$jefe->nombre_jefe}}</option>                      <!-- cambiar para que solo aparesca el rfc -->
                @endforeach
            </select>

            @error('rfc_jefe')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
          </div>
        </div>
    <div class="form-group justify-content-center row">
        <input type="submit" class="btn btn-success" value="agregar area">
    </div>
</form>
   <div class="mt-5 col-12">
            <a href="{{route('area.index')}}" class="btn btn-primary mr-2">regresar</a>
        </div>
@endsection
