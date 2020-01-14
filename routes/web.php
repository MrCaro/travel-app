<?php

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

use App\Mail\ConfirmationEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

Route::get('/', 'PagesViewController@home');
Route::get('/view', 'PagesViewController@destination');
Route::post('/send-mail', 'PagesViewController@book');
Route::get('/send-mail', 'PagesViewController@book');
