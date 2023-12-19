<!-- resources/views/exams/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des Examens</h1>

    @foreach ($exams as $exam)
        <p>{{ $exam->title }} - <a href="{{ route('exams.edit', $exam) }}">Modifier</a> | <a href="{{ route('exams.destroy', $exam) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Supprimer</a></p>
        <form id="delete-form" action="{{ route('exams.destroy', $exam) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    <a href="{{ route('exams.create') }}">Ajouter un nouvel examen</a>
@endsection
