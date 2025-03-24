<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\InfluencersController;


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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/campaign', [CampaignController::class, 'index']);
Route::post('/campaign/add', [CampaignController::class, 'add']);
Route::get('/campaign/delete/{id}', [CampaignController::class, 'delete']);
Route::get('/campaign/edit/{id}', [CampaignController::class, 'edit']);
Route::post('/campaign/edit/{id}', [CampaignController::class, 'update']);



Route::get('/influencers', [InfluencersController::class, 'index']);
Route::post('/influencers/add', [InfluencersController::class, 'add']);
Route::get('/influencers/delete/{id}', [InfluencersController::class, 'delete']);
Route::get('/influencers/edit/{id}', [InfluencersController::class, 'edit']);
Route::post('/influencers/edit/{id}', [InfluencersController::class, 'update']);
