<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// app/Http/Controllers/AnswerController.php

use App\Models\Answer;

class AnswerController extends Controller
{
    public function index()
    {
        $answers = Answer::all();
        return view('answers.index', compact('answers'));
    }

    public function show($id)
    {
        $answer = Answer::findOrFail($id);
        return view('answers.show', compact('answer'));
    }
}
