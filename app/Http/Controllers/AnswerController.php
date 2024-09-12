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
     *la fonction me permettra de retourner la liste des réponses
     *Les ressources dans Laravel sont utilisées pour transformer les modèles de données en un format JSON spécifique lorsqu'ils sont renvoyés par une API. Elles permettent de contrôler précisément la structure et le contenu des réponses JSON.
     */
    public function index()
    {
        try{
            $answer = Answers::all(); // il récupère toutes les questions
            return response()->json([
            'status' => 200,
            "message" => "Toutes les réponses ont ete recuperees avec succes",
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
    foreach ($userResponses as $resp) {
        $response = new Answers();
        $response->value = $resp[0]['value'];
        $response->question_id = $resp[0]['question_id'];
        $responses[] = $response;
    } 
    $uuid->uuidAnswers()->saveMany($responses);

    return response()->json([
        'status' => 200,
        'message' => 'Reponses sauvegardees avec succes',
        'data' => $uuid,
    ], 200);
}

    /**
     * show me permettra de récupérer les réponses de l'utilisateur en fonction de l'UUID fourni dans l'URL
     */
    public function show($uuid) 
    {
        // Recherche de l'UUID dans la table uuids
    $linkResponses = Uuids::where('uuid', $uuid)->first(); // Filtrer par l'UUID fourni
    if ($linkResponses) {
        // Si l'UUID est trouvé, récupérez les réponses correspondantes
        $responses = Answers::where('uuid_id', $linkResponses->id)->get();
        return response()->json([
            'status' => 200,
            'message' => 'Toutes les reponses recuperees avec succes',
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
        $responseQuestions10= $responses->where('question_id', 10)->countBy('value');
        
        // Tableau des IDs des questions pour lesquelles vous souhaitez calculer les moyennes
        $idQuestions = [11, 12, 13, 14, 15];

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
            'message' => 'Donnees statistiques des reponses des utilisateurs',
            'question6' => $responseQuestions6,
            'question7' => $responseQuestions7,
            'question10' => $responseQuestions10,
            'averages' => $averages // Tableau des moyennes pour chaque question
        ]);}
}
