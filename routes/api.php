<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return Auth::user();
});

Route::middleware('auth:api')->get('/profile', function (Request $request) {
    return Auth::user();
});

Route::get('/users', function () {
    return \App\Models\User::all();
});

Route::get('/users/{id}', function ($id) {
    return \App\Models\User::where('id', $id)->first();
});

Route::post('/users', function (Request $request) {
    $data = $request->all();
    try {
        return response()->json(['data'=>\App\Models\User::create($data)],200) ;
    }catch (Exception $e){
        return response()->json(['message'=>'Thêm thất bại','error'=>1],500);
    }
});

Route::put('/users/{id}', function (Request $request, $id) {
    $user = \App\Models\User::find($id);
    $user->email = $request->email;
    return $user->save();
});

Route::delete('/users/{id}', function ($id) {
    return \Illuminate\Support\Facades\DB::table('users')->where('id', $id)->delete();
});
