<?php

use App\Http\Controllers\AuthController;
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

/*
*  GROUP_UNGUARDED
 */
Route::post('/signIn', [AuthController::class, 'signIn'])->name('signIn');
Route::post('/signUp', [AuthController::class, 'signUp'])->name('signUp');
Route::get('/unauthorized', [AuthController::class, 'unauthorized'])->name('unauthorized');

/*
*  GROUP_AUTH
 */
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logOut', [AuthController::class, 'logOut'])->name('logOut');
});
