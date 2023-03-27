<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Actor;
use App\Models\Movie;
use App\Models\Rating;
use App\Models\Director;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::with('type', 'rating')->get();



        return view('layouts.master', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::get();
        $ratings = Rating::get();
        $actors = Actor::get();
        $directors = Director::get();
        return view('layouts.create', compact('types', 'ratings', 'actors', 'directors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->length = $request->length;
        $movie->start_date = $request->start_date;
        $movie->end_date = $request->end_date;
        $movie->year = $request->year;
        $movie->description = $request->description;
        $movie->type_id = $request->type;
        $movie->rating_id = $request->rating;
        $movie->save();
       

        if (strlen($request->image) > 0) {
            $movie->images()->create(['url' => $request->image]);
        }
        
        // $movie->actors()->sync($request->actors) sync se podobro za edit da se koristi;
        $movie->actors()->attach($request->actors);
        $movie->directors()->attach($request->directors);
        
        
        return redirect(route('movie.index'));
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
    public function destroy($id)
    {
        //
    }
}
