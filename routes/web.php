<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get("/students", [StudentController::class, "getStudents"]);
// Route::get("/student", [StudentController::class, "getStudent"]);
// Route::get("/newstudent", [StudentController::class, "newStudent"]);
// Route::get("/updatestudent", [StudentController::class, "updateStudent"]);
// Route::get("/delstudent", [StudentController::class, "deleteStudent"]);
// Route::get("/liststudent", [StudentController::class, "listStudent"]);
// Route::get("/liststudent2", [StudentController::class, "listStudent2"]);
// Route::get("/liststudent3", [StudentController::class, "listStudent3"]);
// Route::get("/liststudent4", [StudentController::class, "listStudent4"]);
// Route::get("/liststudent5", [StudentController::class, "listStudent5"]);
// Route::get("/liststudent6", [StudentController::class, "listStudent6"]);
// Route::get("/feladat1", [StudentController::class, "feladat1"]);
// Route::get("/feladat2", [StudentController::class, "feladat2"]);
// Route::get("/feladat3", [StudentController::class, "feladat3"]);
Route::get("/join1", [StudentController::class, "joinStudent1"]);
Route::get("/join2", [StudentController::class, "joinStudent2"]);
Route::get("/join3", [StudentController::class, "joinStudent3"]);
