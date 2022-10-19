<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('master');
});
Route::get('/index', [UserController::class, 'index'])->name('user.index');
Route::get('export/excel', [UserController::class, 'exportIntoExcel'])->name('export.excel');
Route::get('export/CSV', [UserController::class, 'exportIntoCsv'])->name('export.csv');
Route::get('/import-form', [UserController::class, 'importForm'])->name('user.import');
Route::post('/import-file', [UserController::class, 'import'])->name('import.file');