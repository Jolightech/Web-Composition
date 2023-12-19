<!-- resources/views/exams/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Créer un nouvel Examen</h1>

    <form action="{{ route('exams.store') }}" method="post">
        @csrf
        <label for="title">Titre de l'examen :</label>
        <input type="text" name="title" required>
        <!-- Ajoutez d'autres champs selon vos besoins -->

        <button type="submit">Créer l'examen</button>
    </form>
@endsection
