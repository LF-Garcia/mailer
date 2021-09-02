@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido</div>

                <div class="card-body">
                   
                    <b>Nombre:</b> {{Auth::user()->nombre}} <br>
                    <b>Correo:</b>{{Auth::user()->email}} <br>
                    <b>Rol:</b>{{Auth::user()->rol}} <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
