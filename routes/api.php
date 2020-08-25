<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/verified-only', function (Request $request) {
    dd('Usuario Verificado', $request->user()->name);
})->middleware('auth:api', 'verified');

Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');
Route::post('/password/email', 'API\ForgotPasswordController@sendResetLinkEmail');
Route::post('/password/reset', 'API\ResetPasswordController@reset');
Route::get('/email/resend', 'API\VerificationController@resend')->name('verification.resend');
Route::get('/email/verify/{id}/{hash}', 'API\VerificationController@verify')->name('verification.verify');
Route::post('/user/ticket', 'TicketController@store');
Route::post('/admin/ticket', 'API\TicketController@store');
Route::post('/admin/ticket/{id}', 'API\TicketController@update');
Route::get('/user/ticket/{id}', 'TicketController@show');
Route::get('/priorities', 'API\PrioritiesController@index');
