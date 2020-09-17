@extends('layouts.admin')

@section('content')

<h2 class="text-center mb-5">Agregar tipo de usuario</h2>

 <form method="POST" action="{{route('tipo_usuario.store')}}" novalidate>
    @csrf
        <div class="justify-content-center form-group row">
            <label class="col-sm-1 col-form-label">Id Tipo</label>
            <div class="col-md-4 mb-2">
                <input type="text" name="id_tipo"  class="form-control @error('id_tipo')is-invalid @enderror"
               id="id_tipo" value="{{old('id_tipo')}}" placeholder="ingrese id del tipo"/>

              @error('id_tipo')
              <span class="invalid-feedback d-block" role="alert">
                <strong>{{$message}}</strong>
              </span>
               @enderror
            </div>
        </div>

        <div class="justify-content-center form-group row">
             <label class="col-sm-1 col-form-label">Nombre</label>
               <div class="col-md-4 mb-3">
                  <input type="text" name="nombre" class="form-control @error('nombre')is-invalid @enderror"
                 id="nombre" value="{{old('nombre')}}" placeholder="ingrese nombre del tipo"/>

                  @error('nombre')
                  <span class="invalid-feedback d-block" role="alert">
                  <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
        </div>

            <div class="justify-content-center form-group row">
                <input type="submit" class="btn btn-success" value="agregar">
            </div>

    <div class="mt-5 col-12">
            <a href="{{route('tipo_usuario.index')}}" class="btn btn-primary mr-2">regresar</a>
    </div>
</form>
@endsection
