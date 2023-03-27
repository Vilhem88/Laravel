<?php

namespace App\Http\Controllers;


use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Query\Builder;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(User::get()->id);

        $editors = User::where('role_id', 2)->get();
        return view('editor', compact('editors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'in create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return  redirect(route('/'));
        }
    }

    
}
