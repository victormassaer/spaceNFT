<?php

use App\Http\Controllers\CollectionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NFTController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\ImageController;

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

// Register
Route::get('/register',[UserController::class,'register'], function () {
   return view('register');
})->name('register');

Route::post('/register',[UserController::class,'store'], function () {
 })->name('register');

// Login
Route::get('/login',[UserController::class, 'login'], function () {
    return view('login');
})->name('login');

Route::post('/login',[UserController::class, 'handleLogin'], function () {
    return view('login');
})->name('login');

// Home
Route::get('/', [HomeController::class, 'getData']);

// NFT
Route::get('/nft/{nft}', [NFTController::class, 'show']);
//Route::get('/nft/{nft}', [NFTController::class, 'checkOwner']);


Route::post('/nft/addTokenId/{NFTId}/{tokenId}', [NFTController::class, 'addTokenId']);

Route::get('/assets', function () {
    return view('assets/index');
})->name('assets');

Route::get('/addNFT', function(){
    return view('nft.createNft');
})->name('createNFT');

/*Route::post('/addNFT', [NFTController::class, 'createNFT'], function(){
    return view('nft.createNft');
})->name('createNft');*/
/*Route::post('/addNFT', [ImageController::class, 'saveNFT'], function(){
    return view('nft.createNft');
})->name('createNft');*/

Route::get('/nft/{id}/edit', [NFTController::class, 'edit']);
Route::put('/nft/{id}/update', [NFTController::class, 'update']);
Route::delete('/nft/{id}/delete', [NFTController::class, 'destroy']);

/*Route::post('/addNFT', [ImageController::class, 'saveNFTImage'], function(){
    return view('createNFT');
})->name('createNFT');*/

// Collection

Route::get('/collection', [CollectionController::class, 'getCollections'], function () {
    return view('collection/index');
})->name('collection');

Route::get('/collection/{id}', [CollectionController::class, 'getSingleCollection']);

Route::get('/createCollection', [CollectionController::class, 'getCollectionByUserId'] , function(){
    return view('collection/createCollection');
});

Route::post('/createCollection', [CollectionController::class, 'createCollection'] , function () {
    return view('collection/createCollection');
});
Route::get('/collection/{id}/edit', [CollectionController::class, 'edit']);
Route::put('/collection/{id}/update', [CollectionController::class, 'update']);
Route::delete('/collection/{id}/delete', [CollectionController::class, 'destroy']);


// User
Route::get('/user/{id}', [UserController::class, 'getSingleUser']);
//Route::get('/user/profile/{id}',  [UserController::class, 'getProfileInfo']);
Route::get('/user/profile/{id}/edit', [UserController::class, 'edit']);
//Route::put('/user/profile/{id}/update', [UserController::class, 'updateSingleUser']);
Route::put('/user/profile/{id}/update', [ImageController::class, 'updateUserImage']);

// Logout
Route::get('/logout', [UserController::class, 'logout']);


