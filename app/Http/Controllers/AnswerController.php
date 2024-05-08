<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Uuids;
use Ramsey\Uuid\Uuid;
use App\Models\Answers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnswersResource;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    /**
     * la fonction me permettra de retourner la liste des réponses
     */
    public function index()
    {
        try{
            $answer = Answers::all(); // il récupère toutes les questions
            return response()->json([
            'status' => 200,
            "message" => "Toutes les réponses ont été récupérées avec succès",
            "data" =>AnswersResource::collection($answer)
            ]);
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

  
    /**
     * Store me permet de créer un uuid et de le rattacher aux réponses de l'utilisateur lors de la sauvegarde de ses réponses
     */
    public function store(Request $request)
{
    // Assurez-vous que vos champs sont valides avec le Validator
    $validator = Validator::make($request->all(), [
        'user_answers' => 'required',
        'question_id' => 'required',
    ]);

    // Créez une nouvelle instance de votre modèle réponse
    $uuid = new Uuids();
    $uuid->uuid = Uuid::uuid4()->toString();
    $uuid->save();
    
    $responses = [];
    $userResponses = $request->only('userResponses')['userResponses'];
    // dd($userResponses[0][0]);
    // dd($userResponses['userResponses']);
    foreach ($userResponses as $resp) {
        $response = new Answers();
        // dd($resp[0]);
        $response->user_answers = $resp[0]['user_answers'];
        $response->question_id = $resp[0]['question_id'];
        $responses[] = $response;
        // dump($response);
    } 
    $uuid->uuidAnswers()->saveMany($responses);

    return response()->json([
        'status' => 200,
        'message' => 'Réponses sauvegardées avec succès',
        'uuid' => $uuid,
    ], 200);
}

    /**
     * show me permettra de récupérer les réponses de l'utilisateur en fonction de l'UUID fourni dans l'URL
     */
    public function show($uuid) // 
    {
        // Recherche de l'UUID dans la table uuids
    $linkResponses = Uuids::where('uuid', $uuid)->first(); // Filtrer par l'UUID fourni
    if ($linkResponses) {
        // Si l'UUID est trouvé, récupérez les réponses correspondantes
        $responses = Answers::where('uuid_id', $linkResponses->id)->get();
        return response()->json([
            'message' => 'UUID trouvé', 
            'id' => $linkResponses->id,
            'réponses' => $responses
        ]);
    } else {
        // Si l'UUID n'est pas trouvé, renvoyer une réponse appropriée
        return response()->json(['message' => 'UUID non trouvé'], 404);
    }
        // //recherche de l'UUID dans la table uuids
        // $linkResponses = Uuids::first();
        
        // if ($linkResponses) {
        //     // Si l'UUID est trouvé, récupérez les réponses correspondantes dans la table answers
        //     $responses = Answers::where('uuid_id', $linkResponses->id)->get();
        //     return response()->json([
        //         'message' => 'UUID trouvé',
        //         'id' => $linkResponses->id,
        //         'réponses' => $responses
        //         ]);
        // } else {
        //     // Si aucun UUID correspondant n'est trouvé, renvoyez une réponse appropriée
        //     return response()->json(['message' => 'UUID non trouvé'], 404);
        // };
    }

     /**
     * La fonction me permet de compter les réponses des utilisateurs
     */
    public function countResponses()
    {
        // je récupère toutes les réponses
        $responses = Answers::all();

        // je compte les propositions de réponses ou l'id est égal à 6
        $responseQuestions6 = $responses->where('question_id', 6)->countBy('user_answers');

         // je compte les propositions de réponses ou l'id est égal à 7
         $responseQuestions7 = $responses->where('question_id', 7)->countBy('user_answers');

          // je compte les propositions de réponses ou l'id est égal à 10
        $responseQuestions10= $responses->where('question_id', 10)->countBy('user_answers');

        return response()->json([
            'status' => 200,
            'message' => 'Nombre des propositions des réponses des utilisateurs',
            'question 6' => $responseQuestions6,
            'question 7' => $responseQuestions7,
            'question 10' => $responseQuestions10
        ]);
        // // Tableau pour stocker les comptages de réponses pour chaque question
        // $responseCounts = [
        //     'question_6' => Answers::where('question_id', 6)->count(),
        //     'question_7' => Answers::where('question_id', 7)->count(),
        //     'question_10' => Answers::where('question_id', 10)->count(),
        // ];

        // return response()->json([
        //     'status' => 200,
        //     'responses'=> $responseCounts
        // ]);
    }





    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
