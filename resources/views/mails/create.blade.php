@extends('layouts.app')

@section('header')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-6"><h1>Crear Mail</h1></div>
                
                
               
            </div>

           
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
      <form action="{{route('mail.store')}}" method="post">
          @csrf 

          <div class="form-group row">
            <label for="asunto" class="col-md-4 col-form-label ">Asunto:</label>

            <div class="col-md-12">
                <input  id="asunto" type="text" class="form-control @error('asunto') is-invalid @enderror" name="asunto" value="{{ old('asunto' ) }}"  >

                @error('asunto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <label for="destinatario" class="col-md-4 col-form-label ">destinatario:</label>
            <div class="col-md-12">
               
                <input  id="destinatario" type="text" class="form-control @error('destinatario') is-invalid @enderror" name="destinatario" value="{{ old('destinatario' ) }}"  >

                @error('destinatario')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="cuerpo">Cuerpo:</label>
                    <textarea class="form-control @error('cuerpo') is-invalid @enderror" id="cuerpo" name="cuerpo" rows="3"></textarea>
                  </div>

                @error('cuerpo')
                    {{-- <span class="invalid-feedback" role="alert"> --}}
                        <strong><p class="text-danger">{{ $message }}</p></strong>
                    {{-- </span> --}}
                @enderror
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
            
    </div>
@endsection
