<?php

namespace Database\Seeders;

use App\Models\Choices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //question 3
        $props=new Choices();
        $props->content="Homme";
        $props->choice_question_id=3;
        $props->save();

        $props=new Choices();
        $props->content="Femme";
        $props->choice_question_id=3;
        $props->save();

        $props=new Choices();
        $props->content="Préfère ne pas répondre";
        $props->choice_question_id=3;
        $props->save();

        //question 6
        $props=new Choices();
        $props->content="Oculus Quest";
        $props->choice_question_id=6;
        $props->save();

        $props=new Choices();
        $props->content="Oculus Rift/s";
        $props->choice_question_id=6;
        $props->save();

        $props=new Choices();
        $props->content="HTC Vive";
        $props->choice_question_id=6;
        $props->save();

        $props=new Choices();
        $props->content="Windows Mixed Reality";
        $props->choice_question_id=6;
        $props->save();

        $props=new Choices();
        $props->content="Valve index";
        $props->choice_question_id=6;
        $props->save();

        //question 7
        $props=new Choices();
        $props->content="SteamVR";
        $props->choice_question_id=7;
        $props->save();

        $props=new Choices();
        $props->content="Occulus store";
        $props->choice_question_id=7;
        $props->save();

        $props=new Choices();
        $props->content="Viveport";
        $props->choice_question_id=7;
        $props->save();

        $props=new Choices();
        $props->content="Windows store";
        $props->choice_question_id=7;
        $props->save();

        //question 8
        $props=new Choices();
        $props->content="Occulus Quest";
        $props->choice_question_id=8;
        $props->save();

        $props=new Choices();
        $props->content="Occulus Go";
        $props->choice_question_id=8;
        $props->save();

        $props=new Choices();
        $props->content="HTC Vive Pro";
        $props->choice_question_id=8;
        $props->save();

        $props=new Choices();
        $props->content="PSVR";
        $props->choice_question_id=8;
        $props->save();

        $props=new Choices();
        $props->content="Autre";
        $props->choice_question_id=8;
        $props->save();

        $props=new Choices();
        $props->content="Aucun";
        $props->choice_question_id=8;
        $props->save();

        //question 10
        $props=new Choices();
        $props->content="regarder la TV en direct";
        $props->choice_question_id=10;
        $props->save();

        $props=new Choices();
        $props->content="regarder des films";
        $props->choice_question_id=10;
        $props->save();

        $props=new Choices();
        $props->content="travailler";
        $props->choice_question_id=10;
        $props->save();

        $props=new Choices();
        $props->content="jouer en solo";
        $props->choice_question_id=10;
        $props->save();

        $props=new Choices();
        $props->content="jouer en équipe";
        $props->choice_question_id=10;
        $props->save();

        //question 16
        $props=new Choices();
        $props->content="oui";
        $props->choice_question_id=16;
        $props->save();

        $props=new Choices();
        $props->content="non";
        $props->choice_question_id=16;
        $props->save();

        //question 17
        $props=new Choices();
        $props->content="oui";
        $props->choice_question_id=17;
        $props->save();

        $props=new Choices();
        $props->content="non";
        $props->choice_question_id=17;
        $props->save();

        //question 18
        $props=new Choices();
        $props->content="oui";
        $props->choice_question_id=18;
        $props->save();

        $props=new Choices();
        $props->content="non";
        $props->choice_question_id=18;
        $props->save();

        //question 19
        $props=new Choices();
        $props->content="oui";
        $props->choice_question_id=19;
        $props->save();

        $props=new Choices();
        $props->content="non";
        $props->choice_question_id=19;
        $props->save();

    }
}
