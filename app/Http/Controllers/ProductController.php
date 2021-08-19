<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //dependency injection
    public function detail(Request $request)
    {
        if($request->has('id')) { //isset($_GET['id'])
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
}
