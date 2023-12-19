<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Exam $exam)
    {
        $questions = $exam->questions;
        return view('questions.index', compact('exam', 'questions'));
    }

    public function create(Exam $exam)
    {
        return view('questions.create', compact('exam'));
    }

    public function store(Request $request, Exam $exam)
    {
        $request->validate([
            'content' => 'required|string',
            'type' => 'required|in:multiple_choice,single_choice,text_answer',
            // Ajoutez d'autres validations selon vos besoins
        ]);

        $exam->questions()->create($request->all());

        return redirect()->route('questions.index', $exam)->with('success', 'Question ajoutée avec succès.');
    }

    public function edit(Exam $exam, Question $question)
    {
        return view('questions.edit', compact('exam', 'question'));
    }

    public function update(Request $request, Exam $exam, Question $question)
    {
        $request->validate([
            'content' => 'required|string',
            'type' => 'required|in:multiple_choice,single_choice,text_answer',
            // Ajoutez d'autres validations selon vos besoins
        ]);

        $question->update($request->all());

        return redirect()->route('questions.index', $exam)->with('success', 'Question mise à jour avec succès.');
    }

    public function destroy(Exam $exam, Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index', $exam)->with('success', 'Question supprimée avec succès.');
    }
}
