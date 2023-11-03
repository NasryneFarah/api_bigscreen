<?php

namespace App\Models;

use App\Models\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_answers',
        'question_id',
        'uuid_id', // Ajout de la colonne uuid ici
        'body_question',
    ];

    //Relations entre les réponses et les questions
    public function questions()
    {
        return $this->belongsTo(Question::class); // Chaque réponses appartient à une question
    }

    // //Relations entre les réponses et un uuid
    // public function uuidUser(){
    //     return $this->belongsTo(Uuids::class, 'uuid');//chaque réponse d'utilisateur correspond à un uuid
    // }
}
