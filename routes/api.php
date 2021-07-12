<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ContactTypesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('contacts/create', [ContactsController::class, 'create']);
Route::delete('contacts/delete/{id}', [ContactsController::class, 'delete']);
Route::patch('contacts/update/{id}', [ContactsController::class, 'update']);
Route::get('contacts/list', [ContactsController::class, 'getList']);
Route::get('contacts/{id}', [ContactsController::class, 'getContact']);


Route::get('contact/types', [ContactTypesController::class, 'getTypes']);
