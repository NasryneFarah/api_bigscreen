<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    use HasFactory;

    //Relations entre les réponses et les questions
    public function questions()
    {
        return $this->belongsTo(Question::class); // Chaque réponses appartient à une question
    }
}
