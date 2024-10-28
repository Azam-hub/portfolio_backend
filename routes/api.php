<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\GeneralInfoController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("users/login", [UserController::class, "login"]);


Route::get("generalinfo", [GeneralInfoController::class, "index"]);
Route::get("projects/", [ProjectController::class, "index"]);
// Route::get("contacts/", [ContactController::class, "index"]);
Route::post("contacts/create", [ContactController::class, "create"]);
Route::get("qualifications", [QualificationController::class, "index"]);
Route::get("courses", [CourseController::class, "index"]);
Route::get("experiences", [ExperienceController::class, "index"]);
Route::get("skills", [SkillController::class, "index"]);


Route::middleware("auth:sanctum")->group(function () {
    
    Route::post("check", [UserController::class, "check"]);

    
    Route::get("users", [UserController::class, "index"]);
    Route::post("users/create", [UserController::class, "create"]);
    Route::put("users/update/{id}", [UserController::class, "update"]);
    Route::put("users/delete/{id}", [UserController::class, "destroy"]);

    Route::post("users/logout", [UserController::class, "logout"]);


    // Route::get("generalinfo", [GeneralInfoController::class, "index"]);
    Route::post("generalinfo/update", [GeneralInfoController::class, "update"]);


    // Route::get("projects/", [ProjectController::class, "index"]);
    Route::post("projects/create", [ProjectController::class, "create"]);
    Route::post("projects/update/{id}", [ProjectController::class, "update"]);
    Route::post("projects/delete/{id}", [ProjectController::class, "destroy"]);
    
    
    Route::get("contacts/", [ContactController::class, "index"]);
    // Route::post("contacts/create", [ContactController::class, "create"]);
    Route::post("contacts/delete/{id}", [ContactController::class, "destroy"]);
    
    
    // Route::get("qualifications", [QualificationController::class, "index"]);
    Route::post("qualifications/create", [QualificationController::class, "create"]);
    Route::post("qualifications/update/{id}", [QualificationController::class, "update"]);
    Route::post("qualifications/delete/{id}", [QualificationController::class, "destroy"]);
    

    // Route::get("courses", [CourseController::class, "index"]);
    Route::post("courses/create", [CourseController::class, "create"]);
    Route::post("courses/update/{id}", [CourseController::class, "update"]);
    Route::post("courses/delete/{id}", [CourseController::class, "destroy"]);


    // Route::get("experiences", [ExperienceController::class, "index"]);
    Route::post("experiences/create", [ExperienceController::class, "create"]);
    Route::post("experiences/update/{id}", [ExperienceController::class, "update"]);
    Route::post("experiences/delete/{id}", [ExperienceController::class, "destroy"]);


    // Route::get("skills", [SkillController::class, "index"]);
    Route::post("skills/create", [SkillController::class, "create"]);
    Route::post("skills/update/{id}", [SkillController::class, "update"]);
    Route::post("skills/delete/{id}", [SkillController::class, "destroy"]);
});
