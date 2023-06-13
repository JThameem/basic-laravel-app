<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ImageUploadController;
use Illuminate\support\Facades\DB;

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

Route::get('/', [ImageUploadController::class, 'index']);
Route::post('/image-resize', [ImageUploadController::class, 'imgResize'])->name('img-resize');

Route::get('procedure', function() {
    dd(DB::select('CALL update_user(2, 123);'));
});
