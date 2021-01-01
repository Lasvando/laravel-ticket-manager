@extends('layouts.app')
@section('title', 'Benvenuto')
@section('content')
<div class="hero-image">
    <div class="hero-text">
        <img class="pb-5" src="/img/gls-logo.svg" alt="gls-logo" style="max-height: 300px">
        <h1>Ticket Manager</h1>
        <p>Hai un problema? Lo risolviamo noi!</p>
        <a href="{{ route('home') }}" class="btn btn-outline-primary" type="button">Procediamo</a>
    </div>
</div>
@endsection