<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswersResource;
use Exception;
use App\Models\Answers;
use Illuminate\Http\Request;

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
