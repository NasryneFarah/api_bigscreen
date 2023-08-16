<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route pour tester mon api
Route::get('/test', function(){
    return response()->json(
       [ 
        'status' => 'done',
        'message' => 'Votre api fonctionne'
        ]
    );
});

//Route pour la connexion de l'admin
Route::post('/login', [AuthController::class,'login']);

//Route poour retourner toutes les questions
Route::get('/listes_questions', [QuestionController::class,'index']);