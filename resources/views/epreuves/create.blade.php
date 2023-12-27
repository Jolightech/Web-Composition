<!-- resources/views/epreuves/create.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Ajouter une épreuve</h1>

<form id="epreuveForm" action="{{ route('epreuves.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="Nom">Nom de l'épreuve</label>
        <input type="text" name="Nom" id="Nom" class="form-control" placeholder="Nom">
    </div>

    <!-- Ajoutez d'autres champs selon vos besoins -->

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Obtenir les éléments du formulaire
        const epreuveForm = document.getElementById('epreuveForm');
        const nomInput = document.getElementById('Nom');

        // Écouter l'événement de soumission du formulaire
        epreuveForm.addEventListener('submit', function (event) {
            // Empêcher la soumission du formulaire par défaut
            event.preventDefault();

            // Validation supplémentaire (ajoutez votre propre logique de validation si nécessaire)
            if (nomInput.value.trim() === '') {
                alert('Veuillez entrer un nom pour l\'épreuve.');
                return;
            }

            // Si la validation réussit, soumettez le formulaire
            epreuveForm.submit();
        });
    });
</script>

@endsection
