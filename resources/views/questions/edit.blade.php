<!-- resources/views/questions/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Modifier la Question "{{ $question->content }}" pour l'examen "{{ $exam->title }}"</h1>

    <form action="{{ route('questions.update', ['exam' => $exam, 'question' => $question]) }}" method="post">
        @csrf
        @method('PUT')
        <label for="content">Contenu de la question :</label>
        <input type="text" name="content" value="{{ $question->content }}" required>
        <label for="type">Type de question :</label>
        <select name="type" required>
            <option value="multiple_choice" {{ $question->type === 'multiple_choice' ? 'selected' : '' }}>Choix multiples</option>
            <option value="single_choice" {{ $question->type === 'single_choice' ? 'selected' : '' }}>Choix unique</option>
            <option value="text_answer" {{ $question->type === 'text_answer' ? 'selected' : '' }}>Réponse textuelle</option>
            <!-- Ajoutez d'autres options selon vos besoins -->
        </select>
        <!-- Ajoutez d'autres champs selon vos besoins -->

        <button type="submit">Mettre à jour la question</button>
    </form>
@endsection
