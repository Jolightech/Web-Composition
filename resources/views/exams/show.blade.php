<!-- resources/views/exams/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $epreuves->Nom }}</h1>
    <p>Date de création : {{ $epreuves->created_at }}</p>
    <p>Date de mise à jour : {{ $epreuves->updated_at }}</p>
    <!-- Ajoutez ici d'autres détails spécifiques à l'épreuve -->
    <a href="{{ route('exams.index') }}">Retour à la liste des épreuves</a>
@endsection
