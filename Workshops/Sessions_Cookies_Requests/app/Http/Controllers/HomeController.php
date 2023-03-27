<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public  function index(){

        if (!Session::has(['successLogged'])) {
          return redirect('/login');
        }
        return  view('forms.pageStatus');

    }
}
