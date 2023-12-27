<?php
// app/Models/Question.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['type', 'question'];

    public function addOption($text)
    {
        return $this->options()->create(['text' => $text]);
    }

    public function options()
    {
        return $this->hasMany(Question::class, 'parent_id')->where('type', 'option');
    }
}
