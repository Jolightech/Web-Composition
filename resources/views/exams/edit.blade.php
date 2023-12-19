<!-- resources/views/exams/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier l'Examen "{{ $exam->title }}"</h1>

    <form action="{{ route('exams.update', $exam) }}" method="post">
        @csrf
        @method('PUT')
        <label for="title">Titre de l'examen :</label>
        <input type="text" name="title" value="{{ $exam->title }}" required>
        <!-- Ajoutez d'autres champs selon vos besoins -->

        <button type="submit">Mettre à jour l'examen</button>
    </form>
@endsection
