<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = [

            1 => [
                'id' => '1',
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'johdoe@example.com'
            ],
            2 => [
                'id' => '2',
                'name' => 'Johnson',
                'surname' => 'Steven',
                'email' => 'avoidoe@example.com'
            ],
            3 => [
                'id' => '3',
                'name' => 'Mitchel',
                'surname' => 'Anderson',
                'email' => 'anderson@example.com'
            ]
            

        ];
        
        return view('users/list', compact('users'));


        // Session::put('newSession', 'session value');
    //   return Session::get('newSession');
        // return Session::forget('newSession');
        // return Session::all();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //GET returns a create view
        return view('users.create');
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

        return redirect()->route('users.index')->with('success', 'New user was created!');


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
        $users = [

            1 => [
                'id' => '1',
                'name' => 'John',
                'surname' => 'Doe',
                'email' => 'johdoe@example.com'
            ],
            2 => [
                'id' => '2',
                'name' => 'Johnson',
                'surname' => 'Steven',
                'email' => 'avoidoe@example.com'
            ],
            3 => [
                'id' => '3',
                'name' => 'Mitchel',
                'surname' => 'Anderson',
                'email' => 'anderson@example.com'
            ]
            

        ];
        
        if(!array_key_exists($id, $users)){
            return abort(404);
        }

        return view('users.edit', ['user' => $users[$id]]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        //PUT update object in the DB
        // $request->validate([
        //     'title' => ['required', 'min:4', 'max:20', 'alpha'],
        //     'isbn' => ['required', 'min:4', 'integer'],
        //     'writer' => ['required', 'min:4', 'max:20']
        // ]);

      return redirect()->route('users.index')->with('success', 'User edited!');
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
