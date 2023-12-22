<!-- resources/views/epreuves/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Liste des épreuves</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <!-- Ajoutez d'autres en-têtes selon vos besoins -->
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($epreuves as $epreuve)
                <tr>
                    <th scope="row">{{ $epreuve->id }}</th>
                    <td>{{ $epreuve->Nom }}</td>
                    <!-- Ajoutez d'autres colonnes selon vos besoins -->
                    <td>
                        <a href="{{ route('epreuves.show', ['epreuve' => $epreuve->id]) }}">Voir</a>
                        <a href="{{ route('epreuves.edit', ['epreuve' => $epreuve->id]) }}">Modifier</a>
                         <!-- Bouton de création des questions -->
                        <a href="{{ route('questions.create', ['epreuve_id' => $epreuve->id]) }}" class="btn btn-success">Rédiger le questionnaire</a>
                        <!-- Ajoutez d'autres actions selon vos besoins -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection