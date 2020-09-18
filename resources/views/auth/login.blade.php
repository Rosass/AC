@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center text-white" style="background-color: #77212E;">{{ __('Iniciar  sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            {{-- <label for="usuario_pk" class="col-md-4 mt-4 col-form-label text-md-right">{{ __('Usuario') }}</label> --}}

                            <div class="col-md mt-4">
                                <input placeholder="Usuario" id="usuario_pk" type="text" class="form-control @error('usuario_pk') is-invalid @enderror" name="usuario_pk" value="{{ old('usuario_pk') }}" required autocomplete="usuario_pk" autofocus>

                                @error('usuario_pk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 mt-3 col-form-label text-md-right">{{ __('Contraseña') }}</label>
 --}}
                            <div class="col-md mt-3">
                                <input placeholder="Contraseña" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     {{--    <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group  row mb-0">
                            <div class="mt-3 offset-md-5">
                                <button type="submit" class="btn btn-primary ">
                                    {{ __('iniciar') }}
                                </button>

                              {{--   @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
