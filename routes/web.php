<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\OptionsController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ActivityCategoryController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\EventController;
use UniSharp\Laravel\LaravelFilemanager\Lfm;


use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\PageController as Pages; 
// use App\Http\Controllers\Front\TeamController;
use App\Http\Controllers\Front\ArticleController as Articles;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\EventsController;

Auth::routes();

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->prefix('dashboard')->group(static function () {
    Route::get('/', [HomeController::class, 'index'])->name('homeAdmin');
    Route::resources([
        'slider' => SliderController::class,
        'page' => PageController::class,
        'article' => ArticleController::class,
        'options' => OptionsController::class,
        'team' => TeamController::class,
        'activitycategory' => ActivityCategoryController::class,
        'activity' => ActivityController::class,
        'event' => EventController::class
    ]);
});


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('/', [IndexController::class, 'homepage'])->name('/');
        Route::get('about', [PageController::class, 'about'])->name('about');
        Route::get('our-teams', [TeamController::class, 'list'])->name('our-teams');
        Route::get('our-teams/{id}', [TeamController::class, 'show'])->name('our-team');
        Route::get('articles', [ArticleController::class, 'list'])->name('articles');
        Route::get('articles/{id}', [ArticleController::class, 'show'])->name('article');
        Route::get('events', [EventsController::class, 'list'])->name('events');
        Route::get('events/{id}', [EventsController::class, 'show'])->name('event');
        Route::get('activities/{id?}', [ActivitiesController::class, 'list'])->name('activities');
        Route::get('activitiy/{id}', [ActivitiesController::class, 'show'])->name('activitiy');
        Route::get('contact', [ContactController::class, 'contact'])->name('contact');
        Route::post('save_callback', [ContactController::class, 'saveCallback'])->name('saveCallback');

    });



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    UniSharp\LaravelFilemanager\Lfm::routes();
});

