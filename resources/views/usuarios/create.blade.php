@extends('layouts.app')

@section('header')
<div class="container">
    <div class="col-12">
        <div class="row">
            <h1>Crear</h1>
        </div>
    </div>
</div>
@endsection


@section('content')
    <div class="container">
        <form method="POST" action="{{route('usuarios.store')}}">
            @csrf 

            <div class="form-group row">
                <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula:</label>
    
                <div class="col-md-6">
                    <input  id="cedula" type="text" class="form-control @error('cedula') is-invalid @enderror" name="cedula" value="{{ old('cedula' ) }}"  >
    
                    @error('cedula')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Correo:</label>
    
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email' ) }}"  >
    
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="identificador" class="col-md-4 col-form-label text-md-right">identificador:</label>
    
                <div class="col-md-6">
                    <input  id="identificador" type="text" class="form-control @error('identificador') is-invalid @enderror" name="identificador" value="{{ old('identificador' ) }}"  autocomplete="identificador" autofocus>
    
                    @error('identificador')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="form-group row">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre Completo:</label>
    
                <div class="col-md-6">
                    <input  id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre' ) }}"  autocomplete="nombre" autofocus>
    
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
        
    
           

            <div class="form-group row">
                <label for="celular" class="col-md-4 col-form-label text-md-right">celular:</label>
    
                <div class="col-md-6">
                    <input  id="celular" type="number " class="form-control @error('celular') is-invalid @enderror" name="celular" value="{{ old('celular'  ) }}"  autocomplete="celular">
    
                    @error('celular')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            
           

            <div class="form-group row">
                <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-right">Fecha Nacimiento:</label>
    
                <div class="col-md-6">
                    <input id="fecha_nacimiento" type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('fecha_nacimiento' ) }}"  autocomplete="fecha_nacimiento">
    
                    @error('fecha_nacimiento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="form-group row">
                <label for="rol" class="col-md-4 col-form-label text-md-right">Rol:</label>
    
                <div class="col-md-6">
                    <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol') }}"  autocomplete="rol">
                        <option value=" " >---Seleccione---</option>
                        <option value="Administrador" >Administrador</option>
                        <option value="Usuario" >Usuario</option>
                        
                    </select>
                    @error('rol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
           
    
         
    
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
    
            
            <div class="modal-footer">
                <div class="form-group row mb-0 p-2">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
