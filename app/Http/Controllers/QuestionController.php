<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

// app/Http/Controllers/QuestionController.php

namespace App\Http\Controllers;

use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.show', compact('question'));
    }
}
