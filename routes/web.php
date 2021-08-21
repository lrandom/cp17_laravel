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

/*Route::get('/lien-he',function (){
    return view('contact');
});

Route::post('/do-login',function(){

});

Route::get('/product-detail/{id}', function ($id) {
    echo $id;
})->name('product-detail');

Route::get('/post-detail', function (\Illuminate\Http\Request $request) {
  echo $request->id;
});

Route::get('/content', function () {
    $content = 'Lorem Ipsum dolor sit amen';
     [
            'content' => 'Lorem Ipsum dolor sit amen',
            'content2' => 'HIHI'
        ];
    //return view('content')->with('myContent',$content)->with('content2',$content2);
    $content2 = 'HIHI';
    return view('content', compact('content','content2'));
});*/

Route::get('/product-detail', [\App\Http\Controllers\ProductController::class, 'detail']);//8
//Route::get('/product-detail', "\App\Http\Controllers\ProductController@detail");//7 trở xuống

Route::get('/list-product', [\App\Http\Controllers\ProductController::class, 'listProduct']);


Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'contact']);
Route::post('/do-contact', [\App\Http\Controllers\ContactController::class, 'doContact'])->name('do-contact');

Route::get('/about-us', function () {
    return view('about-us');
});


Route::get('/list-shoes', function () {
    $products = \Illuminate\Support\Facades\DB::table('products')->get();
    foreach ($products as $product){
        echo $product->id;
        echo $product->name;
    }
});
