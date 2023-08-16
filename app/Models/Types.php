<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;

     //Les relations entre les questions et les types de question
    //Il s'agit d'une relation One to many 
    public function questions()
    {
        return $this->hasMany(Questions::class, 'type_id');
    } //Chaque type de question peut avoir plusieurs questions associées
}
