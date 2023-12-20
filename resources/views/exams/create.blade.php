@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle épreuve</h1>
    <form action="{{ route('exams.store') }}" method="post">
        @csrf
        <label for="Nom">Nom de l'épreuve :</label>
        <input type="text" name="Nom" required>
        <button type="submit">Créer l'épreuve</button>
    </form>
    <a href="{{ route('exams.index') }}">Retour à la liste des épreuves</a>
@endsection