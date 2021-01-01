@extends('layouts.app')
@section('title', 'Apri Ticket')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Apri un Ticket') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="post" action="api/create-ticket" class="form-group">
                        {{ csrf_field() }}
                        <input class="form-control @error('object') is-invalid @enderror" type="text" name="object" maxlength="255" placeholder="Oggetto" required>
                        @error('object')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <select class="form-control mt-3 @error('category_id') is-invalid @enderror" name="category_id" required>
                            <option disabled selected>Categoria</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <textarea class="form-control mt-3 @error('description') is-invalid @enderror" name="description" rows="3" placeholder="Descrizione" maxlength="255" required></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <button class="btn btn-action btn-block mt-5" type="submit">Procedi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection