<?php

namespace Database\Seeders;

use App\Models\Questions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $question = new Questions();
        $question->title = "Question 1/20";
        $question->body_questions = "Votre adresse mail?";
        $question->type_id = 2;
        $question->save();

        $question = new Questions();
        $question->title = "Question 2/20";
        $question->body_questions = "Votre âge?";
        $question->type_id = 2;
        $question->save();

        $question = new Questions();
        $question->title = "Question 3/20";
        $question->body_questions = "Votre sexe?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 4/20";
        $question->body_questions = "Nombre de personnes dans votre foyer (adulte & enfants - répondant inclus) ?";
        $question->type_id = 3;
        $question->save();

        $question = new Questions();
        $question->title = "Question 5/20";
        $question->body_questions = "Votre profession?";
        $question->type_id = 2;
        $question->save();

        $question = new Questions();
        $question->title = "Question 6/20";
        $question->body_questions = "Quelle marque de casque VR utilisez-vous?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 7/20";
        $question->body_questions = "Sur quel magasin d'application achetez-vous des contenus VR ?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 8/20";
        $question->body_questions = "Quel casque envisagez-vous d’acheter dans un futur proche ?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 9/20";
        $question->body_questions = "Au sein de votre foyer, combien de personnes utilisent votre casque VR pour regarder Bigscreen ?";
        $question->type_id = 3;
        $question->save();

        $question = new Questions();
        $question->title = "Question 10/20";
        $question->body_questions = "Vous utilisez principalement Bigscreen pour ..... ?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 11/20";
        $question->body_questions = "Combien de points (de 1 à 5) donnez-vous à la qualité de l’image sur Bigscreen ?";
        $question->type_id = 3;
        $question->save();

        $question = new Questions();
        $question->title = "Question 12/20";
        $question->body_questions = "Combien de points (de 1 à 5) donnez-vous au confort d’utilisation de l’interface Bigscreen ?";
        $question->type_id = 3;
        $question->save();

        $question = new Questions();
        $question->title = "Question 13/20";
        $question->body_questions = "Combien de points (de 1 à 5) donnez-vous à la connexion réseau de Bigscreen ?";
        $question->type_id = 3;
        $question->save();

        $question = new Questions();
        $question->title = "Question 14/20";
        $question->body_questions = "Combien de points (de 1 à 5) donnez-vous à la qualité des graphismes 3D dans Bigscreen ?";
        $question->type_id = 3;
        $question->save();

        $question = new Questions();
        $question->title = "Question 15/20";
        $question->body_questions = "Combien de points (de 1 à 5) donnez-vous à la qualité audio dans Bigscreen ?";
        $question->type_id = 3;
        $question->save();

        $question = new Questions();
        $question->title = "Question 16/20";
        $question->body_questions = "Aimeriez-vous avoir des notifications plus précises au cours de vos sessions Bigscreen ?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 17/20";
        $question->body_questions = "Aimeriez-vous pouvoir inviter un ami à rejoindre votre session via son smartphone ?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 18/20";
        $question->body_questions = "Aimeriez-vous pouvoir enregistrer des émissions TV pour pouvoir les regarder ultérieurement ?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 19/20";
        $question->body_questions = "Aimeriez-vous jouer à des jeux exclusifs sur votre Bigscreen ?";
        $question->type_id = 1;
        $question->save();

        $question = new Questions();
        $question->title = "Question 20/20";
        $question->body_questions = "Selon vous, quelle nouvelle fonctionnalité devrait exister sur Bigscreen ?";
        $question->type_id = 2;
        $question->save();
    }
}
