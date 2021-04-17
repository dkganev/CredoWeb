<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shkolo\Shkolo;
use App\Http\Controllers\Server\Rest;
use App\Http\Controllers\CredoWeb\UsersController;
use App\Http\Controllers\CredoWeb\HospitalsController ;
use App\Models\Task;


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



//CredoWeb Users
Route::get('/users',[UsersController::class, 'Index'])->name('CredoWebUsers');

Route::post('/addUser', [UsersController::class, 'addUser']);

Route::post('/openEditUserForm', [UsersController::class, 'openEditUserForm']);

Route::post('/editUser', [UsersController::class, 'editUser']);

Route::post('/deleteUser', [UsersController::class, 'deleteUser']);

//CredoWeb Hospitals
Route::get('/hospitals',[HospitalsController::class, 'Index']);

Route::post('/addHospitals', [HospitalsController::class, 'addHospitals']);

Route::post('/openEditHospitalsForm', [HospitalsController::class, 'openEditHospitalsForm']);

Route::post('/editHospital', [HospitalsController::class, 'editHospital']);

Route::post('/deleteHospital', [HospitalsController::class, 'deleteHospital']);

//End CredoWeb


