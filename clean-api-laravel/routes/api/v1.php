<?php
declare(strict_types=1);

use App\Http\Controllers\Api\V1\Posts\DeleteController;
use App\Http\Controllers\Api\V1\Posts\IndexController;
use App\Http\Controllers\Api\V1\Posts\ShowController;
use App\Http\Controllers\Api\V1\Posts\StoreController;
use App\Http\Controllers\Api\V1\Posts\UpdateController;
use Illuminate\Support\Facades\Route;


//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('posts')->as('posts:')->group(function () {
    Route::get('/', IndexController::class)->name('index');
    Route::post('/', StoreController::class)->name('store'); // route(api:v1:posts:store)
    Route::get('{post:key}', ShowController::class)->name('show');
    Route::patch('{post:key}', UpdateController::class)->name('update');
    Route::delete('{post:key}', DeleteController::class)->name('delete');// route(api:v1:posts:delete)
});
