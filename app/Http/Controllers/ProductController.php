<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class ProductController extends Controller
{
    //dependency injection
    public function detail(Request $request)
    {
        if ($request->has('id')) { //isset($_GET['id'])
            echo $request->id;
            echo $request->input('id');
            echo $request->query('id');
            if ($request->isMethod('GET')) {
                echo 'Đây là get method';
            }
            dd($request->all());
        }
    }

    public function listProduct()
    {
        echo "list product";
    }


    public function listAll()
    {
        //dd(Product::onlyTrashed()->get());
        Product::onlyTrashed()->where('id', 1)->restore();
    }

    public function getWhere()
    {
        dd(Product::where('price', '>', 100)->get());
    }

    public function insert()
    {
        try {
   /*         $product = new Product();
            $product->name = "Giày bataa";
            $product->price = 100;
            $product->category_id = 1;
            $product->keyword = "Bata";
            $product->content = "Giày bền đẹp";
            $product->save();*/

            Product::create([
                'name' => 'Giày Thượng Đình',
                'price'=>120,
                'category_id'=>1,
                'keyword'=>'Thượng đình',
                'content'=>'Thượng Đình company '
            ]);
        } catch (\Exception $e) {
            echo "Chèn dữ liệu lỗi".$e->getMessage();
        }
    }

    public function update()
    {
        try {
            $obj = Product::find(1);
            $obj->price = 200;
            $obj->save();
        }catch (\Exception $e){
            echo "Caapj nhaatj loi";
        }

    }


    public function delete()
    {
        //DEMO XOA MEM
        $obj = Product::find(1);
        $obj->delete();
    }

    public function paginate()
    {
        $products = Product::paginate(10);
        $products->appends(['q' => 'Name']);
        return view('products', compact('products'));
    }

}
