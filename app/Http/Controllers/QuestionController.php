<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionsResource;
use Exception;
use App\Models\Questions;
use Illuminate\Http\Request;

//ce controller me permettre de gérer toutes les fonctionnalités qui tournent autour des questions
class QuestionController extends Controller
{
    //la fonction index me permettra de retourner la liste des questions
    public function index()
    {
        try{
            $questions = Questions::all(); // il récupère toutes les questions
            return response()->json([
            'status' => 200,
            "message" => "Toutes les questions récupérées avec succès",
            "data" => QuestionsResource::collection($questions)
            ]);
        }
        catch(Exception $e){
            return response()->json($e);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
