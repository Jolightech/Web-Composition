<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['type', 'question', 'reponse_attendue', 'note', 'epreuve_id'];

    // Définissez les relations ici, par exemple :
    public function epreuve()
    {
        return $this->belongsTo(Epreuve::class);
    }
}
