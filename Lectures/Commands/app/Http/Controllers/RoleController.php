<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class RoleController extends Controller
{
    public function index(){
        Artisan::call('create:role');
    }
}
