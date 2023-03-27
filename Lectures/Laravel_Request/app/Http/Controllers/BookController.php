<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookFormRequest;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = [

            1 => [
                'id' => '1',
                'title' => 'Book 1',
                'isbn' => '123455',
                'writer' => 'Book hugo'
            ],
            2 => [
                'id' => '2',
                'title' => 'Book 2',
                'isbn' => '123455',
                'writer' => 'Book hugo'
            ],
            3 => [
                'id' => '3',
                'title' => 'Book 3',
                'isbn' => '123455',
                'writer' => 'Book hugo'
            ]
            

        ];
        
        // Session::put('newSession', 'session value');
    //   return Session::get('newSession');
        // return Session::forget('newSession');
        // return Session::all();


        return view('books/list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET returns a create view
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //POST
        // store a new object in a DB

        return redirect()->route('books.index')->with('success', 'New book was created!');


        // return $request->all() returning json data;
        // $data = $request->all(); #returning array
        // dd($data['writer']);

        // dd($request->writer);

        // dd('in store method');
        // dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //GET return a view with a object with a details
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //GET return view for an editing an object
        $books = [

            1 => [
                'id' => '1',
                'title' => 'Book 1',
                'isbn' => '123455',
                'writer' => 'Book hugo'
            ],
            2 => [
                'id' => '2',
                'title' => 'Book 2',
                'isbn' => '123455',
                'writer' => 'Book hugo'
            ],
            3 => [
                'id' => '3',
                'title' => 'Book 3',
                'isbn' => '123455',
                'writer' => 'Book hugo'
            ]
            

        ];
        
        
        if(!array_key_exists($id, $books)){
            return abort(404);
        }

        return view('books.edit', ['book' => $books[$id]]);




    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookFormRequest $request, $id)
    {
        //PUT update object in the DB

        // $request->validate([

        //     'title' => ['required', 'min:4', 'max:20', 'alpha'],
        //     'isbn' => ['required', 'min:4', 'integer'],
        //     'writer' => ['required', 'min:4', 'max:20']


        // ]);


      return redirect()->route('books.index')->with('success', 'Book edited!');
    }   


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DELETE 
    }
}
