<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public  function show()
   {
        $users= new User();
        ($users->all());

        return view('start',['users'=>  $users->all()]);
//        return view('start');
    }

}
