<?php

use App\Http\Controllers\{CourseController,
    CourseEnrollmentController,
    CourseGradeController,
    GradeItemController,
    LevelController,
    StudentController
};
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
Route::apiResource('students', StudentController::class);
Route::apiResource('levels', LevelController::class);
Route::apiResource('courses', CourseController::class);
Route::apiResource('grade-items', GradeItemController::class);


//test
Route::prefix('courses')->group(function () {
    Route::post('{course}/enroll/{student}', [CourseEnrollmentController::class, 'enroll']);
    Route::delete('{course}/unenroll/{student}', [CourseEnrollmentController::class, 'unenroll']);
    Route::get('{course}/students', [CourseEnrollmentController::class, 'getEnrolledStudents']);
    Route::get('{course}/students/{student}/grades', [CourseGradeController::class, 'getStudentGrades']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
