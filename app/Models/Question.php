<?php
// app/Models/Question.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['type', 'enonce', 'reponse_attendue', 'note', 'epreuve_id']; 

    public function epreuve()
    {
        return $this->belongsTo(Epreuve::class);
    }
    
}

