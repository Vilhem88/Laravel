<?php
namespace App\Http\Controllers;

class UserController extends  Controller {


    public function list($name){
        return view('users.index', ['name' => $name]);
    }



}