<!-- resources/views/questions/create.blade.php -->
@extends('layouts.app')

@section('content')

<h1>Créer une question</h1>

<form id="questionForm" action="{{ route('questions.store') }}" method="post">
    @csrf

    <div class="form-group">
        <label for="enonce">Énoncé de la question</label>
        <input type="text" id="enonce" name="enonce" class="form-control" placeholder="Saisissez la question">
    </div>

    <div class="form-group">
        <label for="type">Type de question</label>
        <select name="type" id="type" class="form-control">
            <option value="choix_multiple">Choix Multiple</option>
            <option value="choix_unique">Choix Unique</option>
            <option value="reponse_texte">Réponse Texte</option>
        </select>
    </div>

    <div class="form-group" id="optionsContainer" style="display: none;">
        <label for="ajouterProposition"></label>
        <div id="propositionsContainer"></div>
        <button type="button" id="ajouterProposition">Ajouter une proposition</button>
    </div>

    <div id="noteContainer">
        <label for="noteQuestion">Note de la question</label>
        <input type="text" id="noteQuestion" name="noteQuestion" class="form-control" placeholder="Saisissez la note de la question">
    </div>

    <div class="form-group" id="reponseContainer" style="display: none;">
        <label for="reponse">Réponse Attendue</label>
        <input type="text" id="reponse" name="reponse" class="form-control" placeholder="Saisissez la réponse attendue">
    </div>

    <br><br>
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    //Affichage des champs d'option pour les types choix_unique et choix_multiple
    $(document).ready(function () {
        $("#type").change(function () {
            var selectedType = $(this).val();
            if (selectedType === "choix_unique" || selectedType === "choix_multiple" ) {
                $("#optionsContainer").show();
            } else {
                $("#optionsContainer").hide();
            }
            if (selectedType === "reponse_texte") {
            $("#noteContainer, #reponseContainer").show();
            }
        });
        //Ajout des propositions de réponses


        $("#ajouterProposition").click(function () {
                            var newIndex = $("#propositionsContainer input").length / 2 + 1;
                    var newInput = '';
                    if ($("#type").val() === "choix_unique") {
                        newInput += '<div><input type="radio" name="reponse" value="' + newIndex + '">';
                    } else if ($("#type").val() === "choix_multiple") {
                        newInput += '<div><input type="checkbox" name="reponses[]" value="' + newIndex + '">';
                    }
                    newInput += '<input type="text" name="propositions[]" class="form-control" placeholder="Proposition ' + newIndex + '"></div>';
                    $("#propositionsContainer").append(newInput);
        });
    });
    $("#questionForm").submit(function () {
        // Lors de la soumission du formulaire, je cherche l'index de la proposition sélectionnée
        var selectedType = $("#type").val();

        // Pour le type choix_unique
        if (selectedType === "choix_unique") {
            // Création un objet pour stocker les options et la réponse attendue
            var optionsObj = {};
            var reponseAttendue = null;

            // Sélection tous les champs d'options dans #propositionsContainer
            $("#propositionsContainer input[name='propositions[]']").each(function (index) {
                // Ajout de chaque option à l'objet avec un nom de propriété unique
                optionsObj['option_' + index] = $(this).val();

                // Vérifier si un champ radio est coché (pour choix unique)
                if ($(this).next().is(':checked')) {
                    reponseAttendue = index;
                }
            });

            var selectedProposition = $("input[name='reponse']:checked").val();
            if (selectedProposition === undefined) {
                alert("Veuillez sélectionner une proposition pour la question de choix unique.");
                return false; // J'empêche l'envoi du formulaire si aucune proposition n'est sélectionnée
            }

            // Mise à jour le champ reponse avec l'index de la proposition sélectionnée
            $("#reponse").val(selectedProposition);
        }

        // Pour le type choix_multiple
        if (selectedType === "choix_multiple") {
            // Création d'un tableau pour stocker les options sélectionnées
            var optionsSelectionnees = [];

            // Sélection de tous les champs checkbox dans #propositionsContainer
            $("#propositionsContainer input[name='reponses[]']:checked").each(function () {
                // Ajouter chaque option sélectionnée au tableau
                optionsSelectionnees.push($(this).val());
            });

            // Mise à jour le champ reponses avec le tableau d'options sélectionnées
            $("#reponse").val(optionsSelectionnees.join(', '));
        }
        if (selectedType === "reponse_texte") {
        // Mise à jour du champ reponse avec la valeur du champ texte
        var reponseTexte = $("#reponse").val();
        $("#reponse").val(reponseTexte);
    }

        return true; // Autorisation de l'envoi du formulaire
     });


</script>



@endsection
