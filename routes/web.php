<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/profile', function () {
    if (\Illuminate\Support\Facades\Auth::check()) {
        $user = \Illuminate\Support\Facades\Auth::user();
        dd($user);
    }
})->middleware(['auth']);

Route::get('/my-login', function () {
    $checked = \Illuminate\Support\Facades\Auth::attempt([
        'email' => '',
        'password' => ''
    ]);
    if ($checked) {
        //tạo session user ở đây
    } else {
        //dòng thông báo
    }
});

Route::get('/set-session', [\App\Http\Controllers\SessionDemoControlelr::class, 'setSession']);
Route::get('/get-session', [\App\Http\Controllers\SessionDemoControlelr::class, 'getSession']);
Route::get('/get-all', [\App\Http\Controllers\SessionDemoControlelr::class, 'getAllSession']);

Route::get('/set-flash-session', [\App\Http\Controllers\SessionDemoControlelr::class, 'setFlashSession']);
Route::get('/next', function () {
    return view('next');
});

Route::get('/send-mail', function () {
   // \Illuminate\Support\Facades\Mail::to('mmochicken92@gmail.com')->send(new \App\Mail\ConfirmOrder("Nội dung"));
   // \Illuminate\Support\Facades\Mail::to('mmochicken92@gmail.com')->send(new \App\Mail\CancelOrder());
  //  for ($i = 0; $i < 5; $i++) {
        dispatch(new \App\Jobs\SendMail());
    //}
});
