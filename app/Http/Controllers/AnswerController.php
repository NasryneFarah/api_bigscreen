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
     * Display a listing of the resource.
     */
    public function index()
    {
        //la fonction me permettra de retourner la liste des réponses
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
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show($uuid) // show me permettra de récupérer les réponses de l'utilisateur en fonction de l'UUID fourni dans l'URL
    {
        //recherche de l'UUID dans la table uuids
        $uuidModel = Uuids::where('uuid', $uuid)->first();
        
        if ($uuidModel) {
            // Si l'UUID est trouvé, récupérez les réponses correspondantes dans la table answers
            $responses = Answers::where('uuid_id', $uuidModel->id)->get();
            return response()->json($responses);
        } else {
            // Si aucun UUID correspondant n'est trouvé, renvoyez une réponse appropriée
            return response()->json(['message' => 'UUID non trouvé'], 404);
        }
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
