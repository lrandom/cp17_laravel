<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function contact()
    {
        return view('contact');
    }

    public function doContact(Request  $request)
    {
        $request->validate([
            'fullName'=>'required',
            'address'=>'required',
            'phone'=>'required|numeric',
            'message'=>'required'
        ]);

        //xử lý logic khi mà validate thành công
        //Viết lệnh chèn vào DB
    }
}
