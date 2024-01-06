<?php

// App\Models\Epreuve.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Epreuve extends Model
{
    protected $fillable = ['Nom']; // Assurez-vous que les colonnes que vous utilisez dans le code sont définies ici

    public function questions()
{
    return $this->hasMany(Question::class);
}

}

