<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionsResource extends JsonResource
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
            'title'=>$this->title,
            'body_question'=>$this->body_questions,
            'type'=>$this->questionType->type,//ici je passe par questionType(repésente ma clé étrangère type_id) pour regarder dans la table des types à quoi correspond le type des questions
        ];   //PairsResource me permet d'apporter tous les éléments qui doivent appraraître dans ma réponse json  
        //les resources en Laravel nous permettent de formater notre table et d'envoyer des éléments en plus de ceux présents dans notre table
    }
}
