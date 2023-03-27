<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\ReturnValueNotConfiguredException;

class BookController extends Controller
{



    public function index(){
        return view('books.index');
    }

    public function create(){
        return 'New Book created';
    }

    public function show($book_id){
        $content = 'This is book with this id ' . $book_id;
        $books = [
            $book_id => $content ];

        if(!array_key_exists($book_id, $books )){
            abort(404); 
        }

        return view('books.show', ['title' => $book_id], ['content' => $content]);
    }



}
