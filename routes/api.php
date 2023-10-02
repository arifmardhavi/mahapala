<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LogistikController;
use App\Http\Controllers\Api\DivisiController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\PerpustakaanController;
use App\Http\Controllers\Api\DokumentasiController;

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

Route::prefix('logistik')->group( function () {
    Route::get('', [LogistikController::class ,'index']);
    Route::get('/{id}', [LogistikController::class ,'show']);
    Route::post('', [LogistikController::class ,'store']);
    Route::put('/{id}', [LogistikController::class ,'update']);
    Route::delete('/{id}', [LogistikController::class ,'destroy']);
});

Route::prefix('divisi')->group( function () {
    Route::get('', [DivisiController::class ,'index']);
    Route::get('/{id}', [DivisiController::class ,'show']);
    Route::post('', [DivisiController::class ,'store']);
    Route::put('/{id}', [DivisiController::class ,'update']);
    Route::delete('/{id}', [DivisiController::class ,'destroy']);
});

Route::prefix('kategori')->group( function () {
    Route::get('', [KategoriController::class ,'index']);
    Route::get('/{id}', [KategoriController::class ,'show']);
    Route::post('', [KategoriController::class ,'store']);
    Route::put('/{id}', [KategoriController::class ,'update']);
    Route::delete('/{id}', [KategoriController::class ,'destroy']);
});

Route::prefix('perpustakaan')->group( function () {
    Route::get('', [PerpustakaanController::class ,'index']);
    Route::get('/{id}', [PerpustakaanController::class ,'show']);
    Route::post('', [PerpustakaanController::class ,'store']);
    Route::put('/{id}', [PerpustakaanController::class ,'update']);
    Route::delete('/{id}', [PerpustakaanController::class ,'destroy']);
});

Route::prefix('dokumentasi')->group( function () {
    Route::get('', [DokumentasiController::class ,'index']);
    Route::get('/{id}', [DokumentasiController::class ,'show']);
    Route::post('', [DokumentasiController::class ,'store']);
    Route::put('/{id}', [DokumentasiController::class ,'update']);
    Route::delete('/{id}', [DokumentasiController::class ,'destroy']);
});