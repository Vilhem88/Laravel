<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function index()
    {
        // if(!Auth::check()){
        //     return redirect(route('login'));
        // }
        // if(Auth::user()->age < 30){
        //     return redirect(route('dashboard'));
        // }
        return 'in movie';
    }

    public function create() {


        return 'in a create method';

    }
}
