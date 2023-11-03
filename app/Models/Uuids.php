<?php

namespace App\Models;

use App\Models\Answers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uuids extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid', // Ajout de la colonne uuid ici
    ];
    //relation entre un uuid et les réponses
    //il s'agit d'une relation one to many
    public function uuidAnswers(){
        return $this->hasMany(Answers::class, 'uuid_id');//Un uuid à plusieurs réponses
    }
}
