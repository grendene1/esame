<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FarmlandController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/farmlands", [FarmlandController::class, "list"]);
Route::get("/farmlands/{id}", [FarmlandController::class, "detail"]);
Route::post("/farmlands", [FarmlandController::class, "create"]);
Route::put("/farmlands/{id}", [FarmlandController::class, "modify"]);
Route::delete("/farmlands/{id}", [FarmlandController::class, "destroy"]);