<!-- resources/views/questions/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des Questions pour l'examen "{{ $exam->title }}"</h1>

    @foreach ($questions as $question)
        <p>{{ $question->content }} - <a href="{{ route('questions.edit', ['exam' => $exam, 'question' => $question]) }}">Modifier</a> | <a href="{{ route('questions.destroy', ['exam' => $exam, 'question' => $question]) }}" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Supprimer</a></p>
        <form id="delete-form" action="{{ route('questions.destroy', ['exam' => $exam, 'question' => $question]) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach

    <a href="{{ route('questions.create', $exam) }}">Ajouter une nouvelle question</a>
@endsection
