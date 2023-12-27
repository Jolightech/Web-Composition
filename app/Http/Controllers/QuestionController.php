<?php
// app/Http/Controllers/QuestionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Epreuve;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function create($epreuve_id)
    {
        // Récupérez l'épreuve associée
        $epreuve = Epreuve::findOrFail($epreuve_id);

        // Passez l'épreuve à la vue
        return view('questions.create', compact('epreuve'));
    }
public function store(Request $request)
{
    $request->validate([
        'type' => 'required|in:choix_multiple,choix_unique,reponse_texte',
        'question' => 'required|string|max:255',
        'reponse_attendue' => 'required|string',
        'note' => 'required|numeric|min:0|max:100',
    ]);

    $epreuve = Epreuve::findOrFail($epreuve_id);

    $question = new Question([
        'type' => $request->input('type'),
        'question' => $request->input('question'),
        'reponse_attendue' => $request->input('reponse_attendue'),
        'note' => $request->input('note'),
    ]);

   // Enregistrement de la question dans la base de données
   $question->save();

   // Enregistrement des options si elles existent
   if ($request->has('option')) {
       $options = $request->input('option');
       foreach ($options as $option) {
           // Enregistrez chaque option associée à la question
           $question->options()->create(['text' => $option]);
       }
   }
   if ($type == 'choix_unique' || $type == 'choix_multiple') {
    $options = $request->input('option');
    $reponses = $request->input('reponse');

    // $options est un tableau d'options, $reponses est un tableau d'indices des réponses correctes
    foreach ($options as $index => $option) {
        $estReponseCorrecte = in_array($index + 1, $reponses);
        // Traitez chaque option et si elle est la réponse correcte
    }
}


   return redirect()->route('questions.create')->with('success', 'Question créée avec succès.');
}

    // ... autres méthodes du contrôleur
}
