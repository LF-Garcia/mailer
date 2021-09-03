@extends('layouts.app')

@section('header')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-6"><h1>Usuarios</h1></div>
                <div class="col-6 ">
                    
                    <form class="form-inline my-2 my-lg-0" action="{{route('usuarios.search')}}" method="get">
                        @csrf
                        <div class="btn-group mr-2" role="group" aria-label="Basic example">
                            <a href="{{route('usuarios.create')}}" class="btn btn-secondary btn-xs">Crear</a>
                        </div>
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
                
               
            </div>

           
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        {{$usuarios->onEachSide(1)->links()}}
            <div class="table-responsive text-center">
                <table class="table" style="font-size: 12px;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Idetificador</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Cedula</th>
                        <th scope="col">Email</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                        
                            @forelse ($usuarios as $usuariositem)
                            <tr>
                                <td>{{$usuariositem->id}}</td>
                                <td>{{$usuariositem->ciudad_id}}</td>
                                <td>{{$usuariositem->identificador}}</td>
                                <td>{{$usuariositem->nombre}}</td>
                                <td>{{$usuariositem->celular}}</td>
                                <td>{{$usuariositem->cedula}}</td>
                                <td>{{$usuariositem->email}}</td>
                                <td>{{\Carbon\Carbon::parse($usuariositem->fecha_nacimiento)->diff(\Carbon\Carbon::now())->format('%y años')}}</td>
                                <td>{{$usuariositem->rol}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{route('usuarios.edit', $usuariositem)}}" class="btn btn-secondary btn-xs">Editar</a>
                                    </div>
                                </td> 
                            </tr>
                            @empty
                                
                            @endforelse
                        
                    
                    </tbody>
                </table>
            </div>
    </div>
@endsection
