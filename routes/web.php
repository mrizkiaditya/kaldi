<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlacarteController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main_courseController;
use App\Http\Controllers\NoncoffeeController;
use App\Http\Controllers\PastaController;
use App\Http\Controllers\SnackController;
use App\Models\Coffee;
use App\Providers\FortifyServiceProvider;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Features;
use App\Http\Middleware;

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
//tampilan web

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [KaryawanController::class, 'index']);
Route::get('/mainCourse', [Main_courseController::class, 'index']);

Route::get('/alaCarte', [AlacarteController::class, 'index']);

Route::get('/coffee', [CoffeeController::class, 'index']);

Route::get('/pasta', [PastaController::class, 'index']);

Route::get('/snack', [SnackController::class, 'index']);

Route::get('/nonCoffee', [NoncoffeeController::class, 'index']);




Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    // Route::post('logout'[LogoutController::class]);
    //admin main Course
    Route::get('/admin/main_course', [Main_courseController::class, 'index_admin']);
    Route::get('/admin/main_course/create', [Main_courseController::class, 'create']);
    Route::post('/admin/main_course', [Main_courseController::class, 'store']);
    Route::get('/admin/main_course{id}/edit', [Main_courseController::class, 'edit']);
    Route::patch('/admin/main_course{id}', [Main_courseController::class, 'update']);
    Route::delete('/admin/main_course{id}', [Main_courseController::class, 'destroy']);
    //admin ala carte
    Route::get('/admin/ala_carte', [AlacarteController::class, 'index_admin']);
    Route::get('/admin/ala_carte/create', [AlacarteController::class, 'create']);
    Route::post('/admin/ala_carte', [AlacarteController::class, 'store']);
    Route::get('/admin/ala_carte{id}/edit', [AlacarteController::class, 'edit']);
    Route::patch('/admin/ala_carte{id}', [AlacarteController::class, 'update']);
    Route::delete('/admin/ala_carte{id}', [AlacarteController::class, 'destroy']);
    //admin coffee
    Route::get('/admin/coffee', [CoffeeController::class, 'index_admin']);
    Route::get('/admin/coffee/create', [CoffeeController::class, 'create']);
    Route::post('/admin/coffee', [CoffeeController::class, 'store']);
    Route::get('/admin/coffee{id}/edit', [CoffeeController::class, 'edit']);
    Route::patch('/admin/coffee{id}', [CoffeeController::class, 'update']);
    Route::delete('/admin/coffee{id}', [CoffeeController::class, 'destroy']);
    //admin pasta
    Route::get('/admin/pasta', [PastaController::class, 'index_admin']);
    Route::get('/admin/pasta/create', [PastaController::class, 'create']);
    Route::post('/admin/pasta', [PastaController::class, 'store']);
    Route::get('/admin/pasta{id}/edit', [PastaController::class, 'edit']);
    Route::patch('/admin/pasta{id}', [PastaController::class, 'update']);
    Route::delete('/admin/pasta{id}', [PastaController::class, 'destroy']);
    //admin non coffee
    Route::get('/admin/non_coffee', [NoncoffeeController::class, 'index_admin']);
    Route::get('/admin/non_coffee/create', [NoncoffeeController::class, 'create']);
    Route::post('/admin/non_coffee', [NoncoffeeController::class, 'store']);
    Route::get('/admin/non_coffee{id}/edit', [NoncoffeeController::class, 'edit']);
    Route::patch('/admin/non_coffee{id}', [NoncoffeeController::class, 'update']);
    Route::delete('/admin/non_coffee{id}', [NoncoffeeController::class, 'destroy']);
    //admin snack
    Route::get('/admin/snack', [SnackController::class, 'index_admin']);
    Route::get('/admin/snack/create', [SnackController::class, 'create']);
    Route::post('/admin/snack', [SnackController::class, 'store']);
    Route::get('/admin/snack{id}/edit', [SnackController::class, 'edit']);
    Route::patch('/admin/snack{id}', [SnackController::class, 'update']);
    Route::delete('/admin/snack{id}', [SnackController::class, 'destroy']);
    //admin karyawan
    Route::get('/admin/karyawan', [KaryawanController::class, 'index_admin']);
    Route::get('/admin/karyawan/create', [KaryawanController::class, 'create']);
    Route::post('/admin/karyawan', [KaryawanController::class, 'store']);
    Route::get('/admin/karyawan{id}/edit', [KaryawanController::class, 'edit']);
    Route::patch('/admin/karyawan{id}', [KaryawanController::class, 'update']);
    Route::delete('/admin/karyawan{id}', [KaryawanController::class, 'destroy']);
});


//auth 
