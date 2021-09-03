@extends('layouts.app')

@section('header')
    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col-6"><h1>Mails</h1></div>
                <div class="col-6 ">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{route('mail.create')}}" class="btn btn-secondary btn-xs">Crear</a>
                    </div>
                </div>
                
               
            </div>

           
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        {{$mail->onEachSide(1)->links()}}
            <div class="table-responsive text-center">
                <table class="table" style="font-size: 12px;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">De</th>
                        <th scope="col">Asunto</th>
                        <th scope="col">Destinatario</th>
                        <th scope="col">Cuerpo</th>
                        <th scope="col">Estado</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        
                            @forelse ($mail as $mailItem)
                            <tr>
                                <td>{{$mailItem->id}}</td>
                                <td>{{$mailItem->remitente->nombre}}</td>
                                <td>{{$mailItem->asunto}}</td>
                                <td>{{$mailItem->destino}}</td>
                                <td>{{$mailItem->cuerpo}}</td>
                                <td>{{$mailItem->estado}}</td>
                            </tr>
                            @empty
                                
                            @endforelse
                        
                    
                    </tbody>
                </table>
            </div>
    </div>
@endsection
