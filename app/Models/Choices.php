<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choices extends Model
{
    use HasFactory;

    //relation entre les propositions et les questions
    //il d'une relation one to many
    public function proposalQuestion(){
        return $this->belongsTo(Questions::class, 'choice_question_id');//Une propostion appartient à une question
    }
}
