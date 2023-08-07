<?php

use App\Http\Livewire\CreateTutorial;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\EditTutorial;
use App\Http\Livewire\Home;
use App\Http\Livewire\MyTutorials;
use App\Http\Livewire\ShowTutorial;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', Home::class);
Route::get('/tutorials/{slug}', ShowTutorial::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/create-tutorial', CreateTutorial::class)->name('create-tutorial');
    Route::get('/edit-tutorial/{tutorial}', EditTutorial::class)->name('edit-tutorial');
    Route::get('/my-tutorials', MyTutorials::class)->name('my-tutorials');
});

Route::post('/tinymce/upload', 'App\Http\Controllers\TinyMCEController@upload')->name('tinymce.image-upload');

