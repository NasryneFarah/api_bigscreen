<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Answers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AnswersResource;

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
        //je m'assure avec cette variable que mes champs sont valides
    $request->validate([
        'email' =>'required|string|email',
    ]);

     // Vérifier si l'email existe déjà dans la base de données
     $existingUser = Answers::where('user_email', $request->email)->first();

    //Ici je vérifie si le champ renseigné est correct
    if ($request->fails()) {
        return response()->json([
            'error' => 'Erreur lors de la sauvegarde des messages'
        ], 400);

    }elseif ($existingUser) {
        return response()->json([
            'error' => 'Cet email existe déjà'
        ], 400);
        
    }else{

        //Creation d'une nouvelle instance de mon modèle réponse
        $response = new Answers();
        //Les valeurs pour les champs user_email et user_answers sont extraites de la requête et assignées à l'instance du modèle Response.
        $response->user_email = $request->user_email;
        $response->user_answers = $request->user_answers;
        $response->save();

        return response()->json([
            'message' => 'Message sauvegardé avec succès'
        ], 201);

    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
