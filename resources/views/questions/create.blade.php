<!-- resources/views/questions/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle Question pour l'épreuves "{{ $epreuves->Nom }}"</h1>

    <form action="{{ route('questions.store', $epreuves) }}" method="post">
        @csrf
        <label for="content">Contenu de la question :</label>
        <input type="text" name="content" required>
        <label for="type">Type de question :</label>
        <select name="type" required>
            <option value="multiple_choice">Choix multiples</option>
            <option value="single_choice">Choix unique</option>
            <option value="text_answer">Réponse textuelle</option>
            <!-- Ajoutez d'autres options selon vos besoins -->
        </select>
        <!-- Ajoutez d'autres champs selon vos besoins -->

        <button type="submit">Ajouter la question</button>
    </form>
@endsection
