<!-- resources/views/questions/create.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Créer une question</h1>

<form action="{{ route('questions.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="type">Type de question</label>
        <select name="type" id="type" class="form-control">
            <option value="choix_multiple">Choix Multiple</option>
            <option value="choix_unique">Choix Unique</option>
            <option value="reponse_texte">Réponse Texte</option>
            <!-- Ajoutez d'autres types si nécessaire -->
        </select>
    </div>

    <div class="form-group" id="choix-multiple">
        <label for="choix-multiple">Choix Multiple</label>
        <input type="checkbox" name="choix_multiple[]" value="option1"> Option 1<br>
        <input type="checkbox" name="choix_multiple[]" value="option2"> Option 2<br>
        <!-- Ajoutez d'autres champs pour les choix multiples -->
    </div>

    <div class="form-group" id="choix-unique">
        <label for="choix-unique">Choix Unique</label>
        <input type="radio" name="choix_unique" value="option1"> Option 1<br>
        <input type="radio" name="choix_unique" value="option2"> Option 2<br>
        <!-- Ajoutez d'autres champs pour les choix uniques -->
    </div>

    <div class="form-group" id="reponse-texte">
        <label for="reponse-texte">Réponse Texte</label>
        <textarea name="reponse_texte" class="form-control"></textarea>
        <!-- Ajoutez d'autres champs pour les réponses texte -->
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Masquer tous les champs au chargement de la page
        $("#choix-multiple, #choix-unique, #reponse-texte").hide();

        // Afficher le champ correspondant au type sélectionné
        $("#type").change(function () {
            $("#choix-multiple, #choix-unique, #reponse-texte").hide();
            $("#" + $(this).val()).show();
        });
    });
</script>

@endsection
