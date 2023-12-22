<!-- resources/views/epreuves/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Détails de l'épreuve</h1>
    <ul>
        <li><strong>ID:</strong> {{ $epreuve->id }}</li>
        <li><strong>Nom:</strong> {{ $epreuve->nom }}</li>
        <!-- Ajoutez d'autres détails selon vos besoins -->
    </ul>
    <a href="{{ route('epreuves.edit', ['epreuve' => $epreuve->id]) }}">Modifier</a>
@endsection
