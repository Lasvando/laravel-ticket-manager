@extends('layouts.app')
@section('title', "Dettaglio Ticket ".$ticket->id)
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dettaglio Ticket N°') }}{{$ticket->id}}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-10">
                                    <span><b>Oggetto: </b><i>{{ $ticket->object }}</i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span><b>Data: </b><i>{{ $ticket->created_at->format('d/m/yy')}}</i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span><b>Categoria: </b><i>{{ $ticket->category->name}}</i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span><b>Data: </b><i>{{ $ticket->description}}</i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span><b>Data: </b><i>{{ $ticket->created_at->format('d/m/yy')}}</i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <a href="/api/delete/{{ $ticket->id }}" onclick="return confirm('Sei sicuro?\nL\'operazione sarà irreversibile')" class="btn btn-danger btn-block mt-3" type="button">Elimina</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection