@extends('layouts.admin')

@section('content')


<!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
    Agregar Jefe
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Nuevo Jefe</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form novalidate>
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label">Recipient:</label>
                  <input type="text" class="form-control @error('recipient-name')is-invalid @enderror"  id="recipient-name">
                  @error('recipient-name')
                  <span class="invalid-feedback d-block" role="alert">
                      <strong>{{$message}}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="message-text" class="col-form-label">Message:</label>
                  <textarea class="form-control" id="message-text"></textarea>
                </div>
            </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Añadir</button>
        </div>
      </div>
    </div>
</div> --}}

{{-- <h2 class="text-center mb-5">Jefes</h2> --}}

<div class="card shadow-lg border-0">
        <div class="card-header">
          <i>
            <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="ml-5 bi bi-person-lines-fill " fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7 1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm-2-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm2 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
            </svg>
          </i> Jefes
          <a href="{{route('jefe.create')}}" class="mr-5 text-light btn float-right btn-spinner btn-sm " style="background-color: #77212E;"> <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-person-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm7.5-3a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
          </svg> Añadir</a>
        </div>
<h1>hola mundo1</h1>
    <div class="card-body">
        <form>
            <div class="row justify-content-md-between">
                <div class="col col-lg-7 col-xl-5 form-group">
                    <div class="input-group">
                        <input class="form-control" name="buscar" type="search" placeholder="Ingrese Busqueda"/>
                        <span class="input-group-append">
                            <button type="submit" class="btn text-light" style="background-color: #77212E;"><i><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi text-light bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                              </svg></i> Buscar</button>
                        </span>
                    </div>
                </div>
            </div>
                @if($busquedas)
                    <div class="alert alert-success" role="alert">
                       Los resultados para tu busqueda '{{ $busquedas }}' son:
                    </div>
                @endif
        </form>


            <div class="table-responsive">
                    <table class="table text-center table-hover table-listing">
                        <thead class="text-light" style="background-color: #003366;">
                            <tr>
                                <th scole="col">Rfc</th>
                                <th scole="col">Nombre (s)</th>
                                <th scole="col">Apellido Paterno</th>
                                <th scole="col">Apellido Materno</th>
                                <th scole="col">Telefono</th>
                                <th scole="col">Correo</th>
                                <th scole="col">Estatus</th>
                                <th scole="col">Editar</th>

                            </tr>
                        </thead>
                            <tbody>
                                <tr>
                                    @foreach ($jefes as $jefe)
                                    <td>{{ $jefe->rfc_jefe_pk }}</td>
                                    <td>{{ $jefe->nombre_jefe }}</td>
                                    <td>{{ $jefe->apaterno_jefe }}</td>
                                    <td>{{ $jefe->amaterno_jefe }}</td>
                                    <td>{{ $jefe->telefono_jefe }}</td>
                                    <td>{{ $jefe->correo_jefe }}</td>
                                    <td>{{ $jefe->estatus }}</td>
                                    <td><a href="{{ route('jefe.edit', $jefe->rfc_jefe_pk) }}"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi text-success bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg></a>
                                    </td>
                                </tr>
                                    @endforeach
                             </tbody>
                    </table>
            </div>
        {{ $jefes->links() }}

    </div>
</div>
@endsection

