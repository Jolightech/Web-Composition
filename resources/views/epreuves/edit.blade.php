<!-- resources/views/epreuves/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier l'épreuve</h1>
    {!! Form::model($epreuve, ['action' => ['EpreuveController@update', $epreuve->id], 'method' => 'PATCH']) !!}
        <div class="form-group">
            {{ Form::label('nom', 'Nom de l\'épreuve') }}
            {{ Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Nom']) }}
        </div>
        <!-- Ajoutez d'autres champs selon vos besoins -->
        {{ Form::submit('Modifier', ['class' => 'btn btn-primary']) }}
    {!! Form::close() !!}
@endsection
