<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ParentController;
use App\Http\Controllers\Admin\AcademicStuffController;
use App\Http\Controllers\Admin\QuranChapterController;
use App\Http\Controllers\Admin\QuranVerseController;
use App\Http\Controllers\Admin\QuranTranslationProviderController;
use App\Http\Controllers\Admin\QuranTranslationController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\UserSubmittedCertificateController;





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->group(function (){
        //permissions route
        Route::resource('permissions', PermissionController::class);
        //roles route
        Route::resource('roles', RoleController::class);
        //User route
        Route::resource('users', UserController::class);
        //Settings route
        Route::resource('settings',SettingsController::class);
        //Classes route
        Route::resource('classes',ClassController::class);
        //Sections route
        Route::resource('sections',SectionController::class);
        //Subjects route
        Route::resource('subjects',SubjectController::class);
        //Teachers route
        Route::resource('teachers',TeacherController::class);
        //Students route
        Route::resource('students',StudentController::class);
        //Parents route
        Route::resource('parents',ParentController::class);
        //Academic Staffs route
        Route::resource('academic-stuffs',AcademicStuffController::class);
        //Academic Staffs route
        Route::resource('quran-chapters',QuranChapterController::class);
        //Academic Staffs route
        Route::resource('quran-verses',QuranVerseController::class);
        //Academic Staffs route
        Route::resource('quran-translation-providers',QuranTranslationProviderController::class);
        //Academic Staffs route
        Route::resource('quran-translations',QuranTranslationController::class);
        //Admin Routes
        Route::resource('admins',AdminController::class);
        //Designation Routes
        Route::resource('designations',DesignationController::class);
        //User Submitted Certificate Routes
        Route::resource('user-submitted-certificates',UserSubmittedCertificateController::class);



        // ajax routes
        Route::post('/get-verse-data-by-chapter-id', [QuranTranslationController::class, 'getVerse']);
    });
});


