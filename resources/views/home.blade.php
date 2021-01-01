@extends('layouts.app')
@section('title', "Home")
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row">
                        <a href="/create" class="btn btn-block btn-action" type="button"><b>Apri un nuovo Ticket</b></a>
                    </div>
                    <hr>
                    @if($ticket != null)
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h4>Ultimo Ticket Aperto | {{ $ticket->created_at->diffForHumans()}}</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
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
                                                    <span><b>Categoria: </b><i>{{ $ticket->category->name }}</i></span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <span><b>Descrizione: </b><i>{{ $ticket->description }}</i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <a href="/tickets/detail/{{ $ticket->id }}" class="btn btn-primary btn-block" type="button">Dettagli</a>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col text-center">
                                    <h4 style="color:darkred"><b>Nessun Ticket presente</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <hr>
                    <div class="row mt-5">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <h4>Contatti</h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span><b>Telefono: </b><i>0131 240909</i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span><b>Email: </b><i>alessandria@gls-italy.com</i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span><b>Email ritiri: </b><i>alessandria.ritiri@gls-italy.com</i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <span><b>Indirizzo: </b><i>Via Umberto Giordano, 20, 15100 Alessandria AL</i></span>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2826.0669345036745!2d8.590513215806354!3d44.901634178824246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478775d55a605153%3A0x89c1ebcf05fd067!2sGLS%20Headquarters%20in%20Alexandria!5e0!3m2!1sen!2sit!4v1609367990290!5m2!1sen!2sit" style="width:100%;min-height: 400px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection