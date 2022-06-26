<?php

use App\Http\Controllers\RevisedController;
use App\Http\Controllers\StockController;
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
    return view('welcome');
});

Route::group(['prefix' => 'panel'], function () {
    Route::get('/', [RevisedController::class, 'panel_index'])->name('panel.index');
    Route::get('/deneme', [RevisedController::class, 'deneme'])->name('a');

    Route::get('/revised', [RevisedController::class, 'index']);
    Route::post('/revised', [RevisedController::class, 'createRevised'])-> name('createRevised');

    Route::get('/deneme',[RevisedController::class ,'listRevised']);
    // Route::post('/deneme', [RevisedController::class, 'deleteRevised'])->name('deleteRevised');

    Route::post('/deleteRevised', [RevisedController::class, 'deleteRevised']) -> name('delete.Revised');
    Route::post('/getRevised', [RevisedController::class, 'getRevised']) -> name('get.Revised');
    Route::post('/updateRevised', [RevisedController::class, 'updateRevised']) -> name('update.Revised');


    Route::get('/index',[\App\Http\Controllers\FiratController::class,'index']);
    Route::post('/addfirat',[\App\Http\Controllers\FiratController::class,'addFirat'])->name('add.firat');
    Route::get('/firat/{id}',[\App\Http\Controllers\FiratController::class,'getFirat']);
    Route::post('/updateFirat',[\App\Http\Controllers\FiratController::class,'updateFirat'])->name('update.firat');
    Route::delete('/index/{id}',[\App\Http\Controllers\FiratController::class,'deleteFirat']);


    Route::get('/stock',[StockController::class,'index'])->name('stock');
    Route::get('/stock-fetch',[StockController::class,'fetch'])->name('product.fetch');
    Route::get('/stock-get',[StockController::class,'get'])->name('product.get');
    Route::get('/stock-delete',[StockController::class,'delete'])->name('product.delete');
    Route::post('/stock-update',[StockController::class,'update'])->name('product.update');
    Route::post('/stock-create',[StockController::class,'create'])->name('product.create');

    Route::post('/stock-brand',[StockController::class,'createbrand'])->name('brand.create');

});
