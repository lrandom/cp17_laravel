<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionDemoControlelr extends Controller
{
    //
    public function setSession(Request $request)
    {
        $request->session()->put('school', 'NIIT');
        session([
            'name' => 'Luan'
        ]);
    }

    public function getSession(Request $request)
    {
        if($request->session()->has('school')) {
            echo $request->session()->get('school'); //NIIT
        }
        echo session('name');//Luan
    }

    public function getAllSession(Request $request)
    {
        dd($request->session()->all());
    }


    public function setFlashSession()
    {
        return redirect('/next')->with('success','Thêm thành công');
    }
}
