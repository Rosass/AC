@extends('layouts.admin')

@section('content')

<h2 class="text-center mb-4">Agregar jefe</h2>


 <form method="POST" action="{{route('jefe.store')}}" novalidate>
    @csrf
        <div class="form-row justify-content-center">
            <div class="form-group col-md-4">
                <label for="rfc">RFC*</label>
            <input type="text"
            name="rfc"  class="form-control @error('rfc')is-invalid @enderror"
            id="rfc" value="{{old('rfc')}}" placeholder="ingrese rfc"/>

            @error('rfc')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
           </div>

          <div class="form-group col-md-4">
            <label for="nombre">Nombre*</label>
            <input type="text"
            name="nombre" class="form-control @error('nombre')is-invalid @enderror"
            id="nombre" value="{{old('nombre')}}" placeholder="ingrese nombre(s)"/>

            @error('nombre')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-row justify-content-center">
          <div class="form-group col-md-4">
            <label for="apaterno">Apellido Paterno*</label>
            <input type="text"
            name="apaterno" class="form-control @error('apaterno')is-invalid @enderror"
            id="apaterno" value="{{old('apaterno')}}" placeholder="ingrese apellido paterno"/>

            @error('apaterno')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group col-md-4">
            <label for="amaterno">Apellido Materno</label>
            <input type="text"
            name="amaterno" class="form-control @error('amaterno')is-invalid @enderror"
            id="amaterno" value="{{old('amaterno')}}" placeholder="ingrese apellido materno"/>

            @error('amaterno')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
        </div>

        <div class="form-row justify-content-center">
          <div class="form-group col-md-4">
            <label for="telefono">Telefono*</label>
            <input type="text"
            name="telefono" class="form-control @error('telefono')is-invalid @enderror"
            id="telefono" value="{{old('telefono')}}" placeholder="ingrese telefono"/>

            @error('telefono')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group col-md-4">
            <label for="correo">Correo*</label>
            <input type="text"
            name="correo" class="form-control @error('correo')is-invalid @enderror"
            id="correo" value="{{old('correo')}}" placeholder="ingrese correo" />

            @error('correo')
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror
          </div>
        </div>

    </div>

    <div class="form-group justify-content-center row">
        <input type="submit" class="btn btn-success" value="agregar jefe">
    </div>

</form>
  <div class="mt-5 col-12">
            <a href="{{route('jefe.index')}}" class="btn btn-primary mr-2">regresar</a>
        </div>

@endsection

