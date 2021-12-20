<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;

class petsController extends Controller
{


    public function index()
    {
        $pets=new Pet();
        $users= new User();
        return view('pets',['users'=>  $users->all(), 'pets'=>$pets->all()]);
    }
}
