<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            'id'=>$this->id,
            'question_id'=>$this->question_id,
            'user_email'=>$this->user_email,
            'user_answers'=>$this->user_answers,
            'body_question'=>$this->questions->body_question,//ici je passe par questions(qui repésente ma clé étrangère ) pour regarder dans la table des réponses à quoi correspond le corps de chaque questions
        ];   //PairsResource me permet d'apporter tous les éléments qui doivent appraraître dans ma réponse json  
        //les resources en Laravel nous permettent de formater notre table et d'envoyer des éléments en plus de ceux présents dans notre table
    }
}
