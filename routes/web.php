<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\PageController as AdminPageController;
use App\Http\Controllers\Guest\PageController as GuestPageController;

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

Route::get('/', [GuestPageController::class, 'index'])->name('guest.home');
Route::get('/projects/all', [GuestPageController::class, 'all_projects'])->name('guest.projects.all');
Route::get('/projects/{slug}', [GuestPageController::class, 'detail_project'])->name('guest.projects.detail');

Route::middleware(['auth', 'verified'])
  ->prefix('admin')
  ->name('admin.')
  ->group(function () {

    Route::get('/', [AdminPageController::class, 'index'])->name('home');

    # ROTTE POST RESURCE
    Route::get('/projects/trash', [ProjectController::class, 'trash'])->name('projects.trash.index');
    Route::patch('/projects/trash/{project}/restore', [ProjectController::class, 'restore'])->name('projects.trash.restore');
    Route::delete('/projects/trash/{project}/force-delete', [ProjectController::class,'forceDelete'])->name('projects.trash.force-delete');
    Route::resource('projects', ProjectController::class);
    
  });

require __DIR__ . '/auth.php';