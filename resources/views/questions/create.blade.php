<!-- resources/views/questions/create.blade.php -->
<!-- resources/views/questions/create.blade.php -->

@extends('layouts.app')

@section('content')

<h1>Créer une question</h1>

<form id="questionForm" action="{{ route('questions.store') }}" method="post">
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

    <div class="form-group" id="questionContainer">
        <!-- Les champs de question seront ajoutés ici par JavaScript -->
    </div>

    <div class="form-group" id="optionsContainer" style="display: none;">
        <label for="options">Options de réponse</label>
        <input type="text" name="options[]" class="form-control" placeholder="Option 1">
    </div>

    <div class="form-group" id="reponseContainer" style="display: none;">
        <label for="reponse">Réponse</label>
        <input type="text" name="reponse" class="form-control" placeholder="Saisissez la réponse">
    </div>

    <div class="form-group" id="noteContainer" style="display: none;">
        <label for="note">Note sur 100</label>
        <input type="number" name="note" class="form-control" placeholder="Saisissez la note" min="0" max="100">
    </div>

    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const questionForm = document.getElementById('questionForm');
    const typeSelect = document.getElementById('type');
    const questionContainer = document.getElementById('questionContainer');
    const optionsContainer = document.getElementById('optionsContainer');
    const reponseContainer = document.getElementById('reponseContainer');
    const noteContainer = document.getElementById('noteContainer');

    typeSelect.addEventListener('change', function () {
        questionContainer.innerHTML = '';
        optionsContainer.style.display = 'none';
        reponseContainer.style.display = 'none';
        noteContainer.style.display = 'none';

        switch (typeSelect.value) {
            case 'choix_multiple':
                addChoixMultipleFields();
                reponseContainer.style.display = 'block';
                break;
            case 'choix_unique':
                addChoixUniqueFields();
           
                noteContainer.style.display = 'block';
                break;
            case 'reponse_texte':
                addReponseTexteFields();
                reponseContainer.style.display = 'block';
                noteContainer.style.display = 'block';
                break;
        }
    });

    function addChoixMultipleFields() {
        const questionLabel = document.createElement('label');
        questionLabel.textContent = 'Question à choix multiples';
        questionContainer.appendChild(questionLabel);

        const questionInput = document.createElement('input');
        questionInput.type = 'text';
        questionInput.name = 'question';
        questionInput.placeholder = 'Saisissez la question à choix multiples';
        questionContainer.appendChild(questionInput);

        const optionsLabel = document.createElement('label');
        optionsLabel.textContent = 'Options';
        questionContainer.appendChild(optionsLabel);

        for (let i = 1; i <= 3; i++) {
            const optionInput = createOptionInput(i);
            questionContainer.appendChild(optionInput);
        }

        const addOptionButton = createButton('Ajouter une option', function () {
            const optionInput = createOptionInput(questionContainer.children.length / 2 + 1);
            questionContainer.appendChild(optionInput);
        });
        questionContainer.appendChild(addOptionButton);

        const removeOptionButton = createButton('Supprimer la dernière option', function () {
            if (questionContainer.children.length > 2) {
                questionContainer.removeChild(questionContainer.lastChild);
                questionContainer.removeChild(questionContainer.lastChild);
            }
        });
        questionContainer.appendChild(removeOptionButton);
    }

    function addChoixUniqueFields() {
        const questionLabel = document.createElement('label');
        questionLabel.textContent = 'Question à choix unique';
        questionContainer.appendChild(questionLabel);

        const questionInput = document.createElement('input');
        questionInput.type = 'text';
        questionInput.name = 'question';
        questionInput.placeholder = 'Saisissez la question à choix unique';
        questionContainer.appendChild(questionInput);

        const optionsLabel = document.createElement('label');
        optionsLabel.textContent = 'Options';
        questionContainer.appendChild(optionsLabel);

        for (let i = 1; i <= 3; i++) {
            const optionInput = createOptionInput(i);
            questionContainer.appendChild(optionInput);

            const radioInput = createRadioInput(i);
            questionContainer.appendChild(radioInput);
        }

        const addOptionButton = createButton('Ajouter une option', function () {
            const optionInput = createOptionInput(questionContainer.children.length / 2 + 1);
            questionContainer.appendChild(optionInput);
        });
        questionContainer.appendChild(addOptionButton);

        const removeOptionButton = createButton('Supprimer la dernière option', function () {
            if (questionContainer.children.length > 2) {
                questionContainer.removeChild(questionContainer.lastChild);
                questionContainer.removeChild(questionContainer.lastChild);
            }
        });
        questionContainer.appendChild(removeOptionButton);
    }

    function createOptionInput(index) {
        const optionInput = document.createElement('input');
        optionInput.type = 'text';
        optionInput.name = 'option[]'; // Utilisez un tableau pour les options
        optionInput.placeholder = 'Option ' + index;
        return optionInput;
    }

    function createButton(text, onClick) {
        const button = document.createElement('button');
        button.type = 'button';
        button.textContent = text;
        button.addEventListener('click', onClick);
        return button;
    }

    function addReponseTexteFields() {
        const questionLabel = document.createElement('label');
        questionLabel.textContent = 'Question à réponse texte';
        questionContainer.appendChild(questionLabel);

        const questionInput = document.createElement('input');
        questionInput.type = 'text';
        questionInput.name = 'question';
        questionInput.placeholder = 'Saisissez la question à réponse texte';
        questionContainer.appendChild(questionInput);
    }

    function createRadioInput(index) {
        const radioInput = document.createElement('input');
        radioInput.type = 'radio';
        radioInput.name = 'reponse[]';  // Le même nom pour tous les champs radio
        radioInput.value = index;
        return radioInput;
    }
});
</script>

@endsection
