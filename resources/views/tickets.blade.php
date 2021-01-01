@extends('layouts.app')
@section('title', "Tickets")
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('I tuoi Tickets') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped table-bordered" id="ticket_table">
                        <thead>
                            <tr>
                                <th>Oggetto</th>
                                <th>Data</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr>
                                    <td><span>{{ $ticket->object }}</span></td>
                                    <td><span>{{ $ticket->created_at->format('d/m/yy')}}</span></td>
                                    <td><a href="/tickets/detail/{{ $ticket->id }}"  class="btn btn-secondary btn-block" type="button">Dettagli</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection