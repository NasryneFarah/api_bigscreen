<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uuids extends Model
{
    use HasFactory;
    //relation entre un uuid et les réponses
    //il s'agit d'une relation one to many
    public function uuid(){
        return $this->hasMany(Answers::class);//Un uuid à plusieurs réponses
    }
}
