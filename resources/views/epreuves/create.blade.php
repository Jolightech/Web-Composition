{{-- resources/views/epreuves/create.blade.php --}}

@extends('layouts.app')

@section('content')

    <h1>Ajouter une épreuve</h1>

    {!! Form::open(['url' => route('epreuves.store'), 'method' => 'POST']) !!}

        <div class="form-group">
            {{ Form::label('Nom', 'Nom de l\'épreuve') }}
            {{ Form::text('Nom', '', ['class' => 'form-control', 'placeholder' => 'Nom']) }}
        </div>

        <!-- Ajoutez d'autres champs selon vos besoins -->

        {{ Form::submit('Ajouter', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}

@endsection
