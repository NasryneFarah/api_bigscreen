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
    public function index(Request $request)
    {
        try{
    //         // Nombre de réponses par page
    //     $perPage = 20;
    //     // Récupérer les réponses avec pagination
    //    $answer = Answers::paginate($perPage); // Récupérer les réponses avec pagination
    //    return response()->json([
    //     'status' => 200,
    //     'message' => 'Toutes les réponses ont été récupérées avec succès',
    //     'data' => AnswersResource::collection($answer),
    //     'pagination' => [
    //         'total' => $answer->total(),
    //         'per_page' => $answer->perPage(),
    //         'current_page' => $answer->currentPage(),
    //         'last_page' => $answer->lastPage(),
    //         'next_page_url' => $answer->nextPageUrl(),
    //         'prev_page_url' => $answer->previousPageUrl(),
    //     ]
    //     ]);
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
        'value' => 'required',
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
        $response->value = $resp[0]['value'];
        $response->question_id = $resp[0]['question_id'];
        $responses[] = $response;
        // dump($response);
    } 
    $uuid->uuidAnswers()->saveMany($responses);

    return response()->json([
        'status' => 200,
        'message' => 'Réponses sauvegardées avec succès',
        'data' => $uuid,
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
            'status' => 200,
            'message' => 'Toutes les réponses récupérées avec succès',
            'data' => $responses
        ]);
    } else {
        // Si l'UUID n'est pas trouvé, renvoyer une réponse appropriée
        return response()->json(['message' => 'UUID non trouvé'], 404);
    }
    }

     /**
     * La fonction me permet de compter les réponses des utilisateurs
     */
    public function countResponses()
    {
        // je récupère toutes les réponses
        $responses = Answers::all();

        // je compte les propositions de réponses ou l'id est égal à 6
        $responseQuestions6 = $responses->where('question_id', 6)->countBy('value');

         // je compte les propositions de réponses ou l'id est égal à 7
         $responseQuestions7 = $responses->where('question_id', 7)->countBy('value');

          // je compte les propositions de réponses ou l'id est égal à 10
        $responseQuestions8= $responses->where('question_id', 8)->countBy('value');
        
        // Tableau des IDs des questions pour lesquelles vous souhaitez calculer les moyennes
        $idQuestions = [11, 12, 13, 14, 15];

        /** sum est une fonction en laravel qui me permet d'additionner toutes les valeurs de la collection responses */
         /** count est une méthode en laravel qui me permet de compter le nombre d'éléments dans la collection responses */
          /** round($sum / $count,2) avec cette méthode je divise la somme totale des réponses par le nombre de totale des réponses pour obtenir la moyenne */
          /** round me permettra d'arrondir cette moyenne à deux chiffres apès la virgule */
          /**$count > 0 ? ... : 0 vérifie si le nombre de réponse est supérieur à 0 Si c'est le cas ($count > 0), elle calcule et renvoie la moyenne arrondie. Sinon (: 0), elle renvoie zéro pour éviter une division par zéro. */
        // Fonction pour calculer la moyenne
        $calculateAverage = function ($responses) {
            $sum = $responses->sum();
            $count = $responses->count();
            return $count > 0 ? round($sum / $count, 2) : 0; // arrondir à 2 chiffres après la virgule
        };
        // Tableau pour stocker les moyennes de chaque question
        $averages = [];
        // Calcul des moyennes pour les questions 11 à 15
        foreach ($idQuestions as $idQuestion) {
        // Je récupère les réponses pour la question actuelle
        $responsesQuestion = $responses->where('question_id', $idQuestion)->pluck('value');
        // Calcul de la moyenne pour la question actuelle
        $average = $calculateAverage($responsesQuestion);
        // J'ajoute la moyenne au tableau des moyennes avec la clé correspondant à l'ID de la question
        $averages["average{$idQuestion}"] = $average; 
    }
        return response()->json([
            'status' => 200,
            'message' => 'Données statistiques des réponses des utilisateurs',
            'question6' => $responseQuestions6,
            'question7' => $responseQuestions7,
            'question8' => $responseQuestions8,
            'averages' => $averages // Tableau des moyennes pour chaque question
        ]);}

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
