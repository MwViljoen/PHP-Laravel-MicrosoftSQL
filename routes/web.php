<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;

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
/*This is the route page using a controller most of the routes are controlled there
we have get routes to fetch views and data from DB
first call state the url which will be activated when that specific url is entered upon the get request
then we also mention the controller and state it is a class we also import at the top of page the controller class
then we call the method in the controller to be used upon  the url request/get*/
Route::get('/', [PagesController::class, 'home']);
Route::get('/CategoryView/{slug}', [PagesController::class, 'CategoryView']);
// url expecting a ID from url will be used in controller
Route::get('/ArticleView/{ArticleID}', [PagesController::class, 'ArticleView']);
Route::get('/TagView/{tag}', [PagesController::class, 'TagView']);
Route::get('/AboutUs', [PagesController::class, 'AboutUs']);
Route::get('/Legal_Terms_Privacy', [PagesController::class, 'Legal_Terms_Privacy']);
/**/
Route::post('/Search', [PagesController::class, 'Search']);
Route::view('/Search', 'Search');
