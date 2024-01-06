<?php
// app/Http/Controllers/QuestionController.php;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Epreuve;

class QuestionController extends Controller
{
    //Pour lister les questions de chaque épreuve
    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    //Pour créer chaque question
    public function create($epreuve_id)
    {
        // Récupération de l'épreuve associée
        $epreuve = Epreuve::findOrFail($epreuve_id);

        // Je passe l'épreuve à la vue
        return view('questions.create', compact('epreuve'));
    }

    //Pour enregistrer chaque question
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'type' => 'required|in:choix_unique,choix_multiple,reponse_texte',
            'enonce' => 'required|string',
            'noteQuestion' => 'required|string',
            'epreuve_id' => 'required|exists:epreuves,id',
        ]);
    
        // Créez une nouvelle question avec les données du formulaire
        $question = new Question;
        $question->type = $request->type;
        $question->enonce = $request->enonce;
    
        // Stockage de la réponse attendue en fonction du type de question
        if ($request->type == 'choix_unique') { //type choix_unique
            $indexReponse = $request->reponse;
            $question->reponse_attendue = $request->propositions[$request->reponse - 1];
            $question->note = $request->noteQuestion;//stokage de la note
        } elseif ($request->type == 'choix_multiple') { //type choix_multiple
            //  stockage des réponses multiples dans un tableau
            $question->reponse_attendue = json_encode($request->reponse);
            $question->note = $request->noteQuestion;
        } elseif ($request->type == 'reponse_texte') { //type réponse_texte
            $question->reponse_attendue = $request->reponse;
        }
    
        // Stockage de la note
        $question->note = $request->noteQuestion;
    
        // Enregistrez la question dans la base de données  
        $question->save();
    
        // Redirigez l'utilisateur sur la liste des épreuves, à changer plus tard
        return redirect()->route('epreuves.index')->with('success', 'Question créée avec succès.');
    }
}
