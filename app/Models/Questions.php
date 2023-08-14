<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    //Relations entre les questions et les types de question
    //Il s'agit d'une relation One to many 
    public function questionType()
    {
        return $this->belongsTo(Types::class);
    } // chaque questions appartient à un seul type de question

    //Relations entre les questions et les réponses
    public function responses()
    {
        return $this->hasOne(Answers::class); //chaque questions peut avoir une seule réponse
    }
}