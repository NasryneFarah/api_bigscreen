<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'user_answers',
        'question_id',
        'body_question'
    ];

    //Relations entre les réponses et les questions
    public function questions()
    {
        return $this->belongsTo(Question::class); // Chaque réponses appartient à une question
    }
}
