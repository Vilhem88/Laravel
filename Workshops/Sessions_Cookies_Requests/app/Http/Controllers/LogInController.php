<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Validator;

class LogInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has(['successLogged'])) {
            return view('forms.login');
        }

        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginFormRequest $request)
    {
        // $validator = Validator::make($request, [
        //     'username' => ['required','min:2', 'max:30', 'alpha'], 
        //     'email' => ['required','min:2', 'max:30', 'email'], 
        //     'password' => ['required','min:2', 'max:30',  'regex:/[0-9]/'], 
        //     'date' => ['required']
        // ]);

        // if($request->fails()){

        //     return view('forms.pageStatus', ['status' => 'failed']);
        // }


        Session::put('successLogged', 'Welcome ' . $request->username);
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

        Session::flush();
        return redirect('/login ');
        
    }
}
