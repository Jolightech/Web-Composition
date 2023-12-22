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
public function store(Request $request, $epreuve_id)
{
    $request->validate([
        'type' => 'required|string',
        'question' => 'required|string',
        'reponse_attendue' => 'required|string',
        'note' => 'required|numeric|min:0|max:20',
    ]);

    $epreuve = Epreuve::findOrFail($epreuve_id);

    $question = new Question([
        'type' => $request->input('type'),
        'question' => $request->input('question'),
        'reponse_attendue' => $request->input('reponse_attendue'),
        'note' => $request->input('note'),
    ]);

    $epreuve->questions()->save($question);

    return redirect()->route('epreuves.index')->with('success', 'Question ajoutée avec succès');
}

    // ... autres méthodes du contrôleur
}
