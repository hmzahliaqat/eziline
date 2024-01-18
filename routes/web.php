<?php


use App\Http\Controllers\comments\comment;
use App\Http\Controllers\likes\like;
use App\Http\Controllers\notifications\notification;
use App\Http\Controllers\tasks\delete;
use App\Http\Controllers\tasks\search;
use App\Http\Controllers\tasks\task;
use App\Http\Controllers\tasks\update;
use App\Http\Controllers\user\authUser as UserAuthUser;
use App\Http\Controllers\user\role;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Route::post('/createTask',[task::class,'create']);
Route::get('/getTasks',[task::class,'getTasks']);
Route::get('/taskDetails/{id}',[task::class,'taskDetails']);

Route::post('/updateTaskInstance/{id}',[update::class,'updateTaskInstance']);
Route::post('/updateTask/{id}',[update::class,'updateTask']);
Route::post('/deleteTask/{id}',[delete::class,'deleteTask']);
Route::post('/searchTasks/{query}',[search::class,'searchTasks']);

Route::post('/createComment/{id}',[comment::class,'create']);

Route::post('toggleLike/{id}',[like::class,'toggleLike']);

Route::post('/getUserRole',[role::class,'getUserRole']);


Route::post('/getNotifications',[notification::class,'getNotifications']);

Route::post('/getAuthUser',[UserAuthUser::class,'getAuthUser']);






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});
