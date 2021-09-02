@extends('layouts.app')

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
                                        <form action="{{-- route('usuarios.edit', $usuariositem) --}}" method="get" >
                                            @csrf
                                            <button type="submit" class="btn btn-secondary btn-xs">Editar</button>
                                        </form>

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
