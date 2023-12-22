<!-- resources/views/epreuves/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier l'épreuve</h1>
    {!! Form::model($epreuve, ['route' => ['epreuves.update', $epreuve->id], 'method' => 'put']) !!}

        <div class="form-group">
            {{ Form::label('Nom', 'Nom de l\'épreuve') }}
            {{ Form::text('Nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) }}
        </div>

        <!-- Ajoutez d'autres champs selon vos besoins -->

        {{ Form::submit('Modifier', ['class' => 'btn btn-primary']) }}

    {!! Form::close() !!}
@endsection
