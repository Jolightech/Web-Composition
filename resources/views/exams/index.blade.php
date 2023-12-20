<!-- resources/views/exams/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des épreuves</h1>
    <ul>
        @foreach($exams as $epreuves)
            <li><a href="{{ route('exams.show', $epreuves->id) }}">{{ $epreuves->Nom }}</a></li>
        @endforeach
    </ul>
@endsection
