<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

require_once "roadmap/backend.php";
require_once "roadmap/frontend.php";

Route::get('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken(auth()->user()->name);

    return ['token' => $token->plainTextToken];
});
