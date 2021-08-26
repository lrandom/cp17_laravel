<?php

use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    $products = \Illuminate\Support\Facades\DB::table('products')
        ->where('id', 1)
        ->orWhere('price', '120')
        ->get();


    $products = \Illuminate\Support\Facades\DB::table('products')
        ->where('price', 100)
        ->orWhere(function ($query) {
            $query->where('id', 100)->where('name', 'Adidas');
        });
    //SELECT * FROM products where price=100 OR (id=100 AND name='ADIDAS')
    //SELECT * FROM products where id=1 or price=120
    foreach ($products as $product) {
        echo $product->id;
        echo $product->name;
    }
});

Route::get('/get-one', function () {
    $shoes = DB::table('products')->find(1);
    dd($shoes);
});

Route::get('/total', function () {
    echo DB::table('products')->where('id', 1)->count();
    echo '<br>';
    echo DB::table('products')->sum('price');
    echo '<br>';
    echo DB::table('products')->avg('price');
    echo '<br>';
    echo DB::table('products')->min('price');
});

Route::get('/select', function () {
    dd(DB::table('products')->select(['id', 'name'])->get());
});

Route::get('/join', function () {
    $category = DB::table('categories')->join('products', 'categories.id', 'category_id')->get();
    //dd($category);
    // $category2 = DB::table('categories')->leftJoin('products','categories.id','category_id')->get();
    // dd($category2);
});

Route::get('/insert', function () {
    DB::table('categories')->insert([
        'name' => 'Giày Việt Nam'
    ]);

    $price = 100;
    DB::table('products')->insert([
        'price' => $price,
        'name' => 'Giày Bitish',
        'content' => 'Giày Việt Nam bền đẹp',
        'category_id' => 3
    ]);

});

Route::get('/insert-form', function () {
    return view('insert');
});

Route::get('/update', function () {
    DB::table('products')->where('id', 11)->update([
        'name' => 'Puma Suedues'
    ]);
});

Route::get('/delete', function () {
    DB::table('products')->where('id', 11)->delete();
});


Route::post('/do-insert', function (Request $request) {
    $price = $request->input('price');
    $name = $request->name;
    $content = $request->content;
    $category_id = $request->category_id;
    $keyword = $request->keyword;

    //$request->all();

    DB::table('products')->insert([
        'price' => $price,
        'name' => $name,
        'content' => $content,
        'category_id' => $category_id,
        'keyword' => $keyword
    ]);

    DB::table('products')->insert([
        'price' => $request->price,
        'name' => $request->name,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'keyword' => $request->keyword
    ]);

    $all = $request->all();
    unset($all['_token']);
    DB::table('products')->insert($all);
})->name('do-insert');


Route::get('/list-products', [\App\Http\Controllers\ProductController::class, 'listAll',
]);

Route::
get('/get-where', [\App\Http\Controllers\ProductController::class, 'getWhere']);

Route::get('/insert-orm', [\App\Http\Controllers\ProductController::class, 'insert',
]);

Route::get('/update-orm', [\App\Http\Controllers\ProductController::class, 'update',
]);

Route::get('/delete', [\App\Http\Controllers\ProductController::class, 'delete']);
Route::get('/paginate', [\App\Http\Controllers\ProductController::class, 'paginate']);

Route::get('/find-one-user/{id}', function ($id) {
    /*$users = \App\Models\User::where('id', '<', 3)->get();
    foreach ($users as $user) {
        echo $user->id . '<br>';
        echo $user->name . '<br>';
        echo $user->email . '<br>';
        echo $user->userInfo->address . '<br>';
    }*/
    $userInfo = \App\Models\UserInfo::find(1);
    echo $userInfo->user->name;

});

Route::get('/1-n', function () {
    $category = \App\Models\Category::find(1);
    $products = $category->products;
    foreach ($products as $product) {
        echo $product->id . '-' . $product->name."<br>";
    }
});

Route::get('/n-1', function () {
    //$category = \App\Models\Category::find(1);
    $products = \App\Models\Product::all();
    foreach ($products as $product) {
        echo $product->id . '-' . $product->name . '-danh mục:' . $product->category->name.'<br>';
    }
});


Route::get('/n-n', function () {
    $order = \App\Models\Order::find(1);
    $products = $order->products;
    foreach ($products as $product) {
        echo $product->name . '<br>';
    }

    $product = \App\Models\Product::find(1);
    $orders = $product->orders;
    foreach ($orders as $order) {
        echo $order->id . '-' . $order->total.'<br>';
    }
});
