<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminEnrollmentController;
use App\Http\Controllers\StudentEnrollmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'login']);
Route::post('login-store', [AuthController::class, 'loginstore']);
Route::get('logout', [AuthController::class, 'logout']);

Route::group(['middleware' => 'checkloggedin'], function(){
    Route::get('dashboard', [AuthController::class, 'dashboard']);

    Route::group(['middleware' => 'checkIfAdmin'], function(){
        Route::get('student-register', [StudentController::class, 'register']);
        Route::post('store-student', [StudentController::class, 'store']);
        Route::get('students', [StudentController::class, 'all']);
        Route::get('edit-student/{id}', [StudentController::class, 'edit']);
        Route::post('update-student/{id}', [StudentController::class, 'update']);
        Route::get('delete-student/{id}', [StudentController::class, 'delete']);

        Route::get('create-course', [CourseController::class, 'createCourse']);
        Route::post('store-course', [CourseController::class, 'store']);
        Route::get('courses', [CourseController::class, 'courselist']);
        Route::get('edit-course/{id}', [CourseController::class, 'edit']);
        Route::post('update-course/{id}', [CourseController::class, 'update']);
        Route::get('delete-course/{id}', [CourseController::class, 'delete']);

        Route::get('create-session', [SessionController::class, 'createSession']);
        Route::post('store-session', [SessionController::class, 'store']);
        Route::get('sessions', [SessionController::class, 'sessionlist']);
        Route::get('edit-session/{id}', [SessionController::class, 'edit']);
        Route::post('update-session/{id}', [SessionController::class, 'update']);

        Route::get('course-limit', [AdminEnrollmentController::class, 'courseLimit']);
        Route::get('edit-courselimit/{id}', [AdminEnrollmentController::class, 'editLimit']);
        Route::post('update-courselimit/{id}', [AdminEnrollmentController::class, 'updateLimit']);

        Route::get('overlap', [AdminEnrollmentController::class, 'overlap']);
        Route::get('admin-profile', function(){
            return view('admin.profile');
        });
    });

    Route::group(['middleware' => 'checkIfStudent'], function(){
        Route::get('enroll-course', [StudentEnrollmentController::class, 'enrollcourse']);
        Route::post('enrollmentfinal', [StudentEnrollmentController::class, 'enrollmentfinal']);
        Route::get('checkrequests', [StudentEnrollmentController::class, 'checkrequests']);
        Route::get('deleteencourse/{id}', [StudentEnrollmentController::class, 'deleteencourse']);

        Route::get('edit-profile', [ProfileController::class, 'studentprofile']);
        Route::post('update-profile', [ProfileController::class, 'updatestudentprofile']);

        Route::get('edit-pass', [ProfileController::class, 'editpass']);
        Route::post('change-pass', [ProfileController::class, 'changepass']);
    });
});



// Route::get('/dashboard', function () {
//     return view('admin.layouts.default');
// });