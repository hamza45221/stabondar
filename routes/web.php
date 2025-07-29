<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\FrontPageController::class, 'index'])->name('index');
Route::get('/contact', [App\Http\Controllers\FrontPageController::class, 'contact'])->name('contact');
Route::get('/send-message', [\App\Http\Controllers\Admin\ContactController::class, 'contactMessage'])->name('contact.message');
Route::get('cases/{slug}', [\App\Http\Controllers\Admin\CaseController::class, 'show'])->name('projects.show');


Route::group(['prefix'=>'admin'], function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');


    Route::group(['prefix' => 'heromain','middleware'=>'auth'], function () {
        Route::get('/', [App\Http\Controllers\Admin\HeroMainController::class, 'index'])->name('admin.heromain');
        Route::post('/store', [App\Http\Controllers\Admin\HeroMainController::class, 'store'])->name('admin.heromain.store');
    });

    Route::group(['prefix'=>'case'],function(){
        Route::get('/',[\App\Http\Controllers\Admin\CaseController::class,'index'])->name('admin.case.blog');
        Route::get('/fetch',[\App\Http\Controllers\Admin\CaseController::class,'fetch'])->name('admin.case.fetch');
        Route::post('/store',[\App\Http\Controllers\Admin\CaseController::class,'store'])->name('admin.case.store');
        Route::post('/delete-multiple',[\App\Http\Controllers\Admin\CaseController::class,'deleteMultiple'])->name('admin.case.delete.multiple');
        Route::get('/delete/{id}',[\App\Http\Controllers\Admin\CaseController::class,'delete'])->name('admin.case.delete');
    });

    Route::group(['prefix' => 'contact'], function () {
        Route::get('/', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('admin.contact');
        Route::post('/store', [App\Http\Controllers\Admin\ContactController::class, 'store'])->name('admin.contact.store');
    });



});
