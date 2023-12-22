<?php
// app/Http/Controllers/EpreuveController.php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Epreuve;

class EpreuveController extends Controller
{
    public function index()
    {
        $epreuves = Epreuve::all();
        return view('epreuves.index', compact('epreuves'));
    }

    public function create()
    {
        return view('epreuves.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            // Ajoutez d'autres règles selon vos besoins
        ]);

        Epreuve::create($request->all());

        return redirect()->route('epreuves.index')->with('success', 'Épreuve ajoutée avec succès');
    }

    public function show($id)
    {
        $epreuve = Epreuve::findOrFail($id);
        return view('epreuves.show', compact('epreuve'));
    }

    public function edit($id)
    {
        $epreuve = Epreuve::findOrFail($id);
        return view('epreuves.edit', compact('epreuve'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nom' => 'required|string|max:255',
            // Ajoutez d'autres règles selon vos besoins
        ]);

        $epreuve = Epreuve::findOrFail($id);
        $epreuve->update($request->all());

        return redirect()->route('epreuves.index')->with('success', 'Épreuve mise à jour avec succès');
    }

    public function destroy($id)
    {
        $epreuve = Epreuve::findOrFail($id);
        $epreuve->delete();

        return redirect()->route('epreuves.index')->with('success', 'Épreuve supprimée avec succès');
    }
}
