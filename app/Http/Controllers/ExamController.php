<?php

namespace App\Http\Controllers;

use App\Models\Epreuve;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Epreuve::all();
        return view('exams.index', compact('exams'));
    }

    public function create()
    {
        return view('exams.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string',
            // Ajoutez d'autres validations selon vos besoins
        ]);

        Epreuve::create($request->all());

        return redirect()->route('exams.index')->with('success', 'Exam créé avec succès.');
    }

    public function edit(Exam $exam)
    {
        return view('exams.edit', compact('exam'));
    }

    public function update(Request $request, Exam $exam)
    {
        $request->validate([
            'Nom' => 'required|string',
            // Ajoutez d'autres validations selon vos besoin
        ]);

        $exam->update($request->all());

        return redirect()->route('exams.index')->with('success', 'Exam mis à jour avec succès.');
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();

        return redirect()->route('exams.index')->with('success', 'Exam supprimé avec succès.');
    }
}
