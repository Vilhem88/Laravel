<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\MovieFormRequest;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::get();
        return view('layouts.movie', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::get();
        return view('layouts.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieFormRequest $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->price = $request->price;

        if (!$movie->save()) {
            return redirect(route('movies.index'))->with('error', 'Movie not saved');
        }

        $movie->genres()->attach($request->genres);
        return redirect(route('movies.index'))->with('success', 'Movie added successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('layouts.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieFormRequest $request, Movie $movie)
    {
        $movie->title = $request->title;
        $movie->price = $request->price;

        if (!$movie->save()) {
            return redirect(route('movies.index'))->with('error', 'Movie not saved');
        }

        $movie->genres()->sync($request->genres);
        return redirect(route('movies.index'))->with('success', 'Movie edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->delete()) {
            return redirect(route('movies.index'))->with('success', 'Movie deleted successfully');
        }
        return redirect(route('movies.index'))->with('error', 'Movie was not deleted');
    }


    public function rent(Movie $movie)
    {

        if (Auth::user()->credit < $movie->price) {
            return redirect(route('movies.index'))->with('error', 'Not enough credit to rent!');
        }
        $movie->user_id = Auth::id();
        if (!$movie->save()) {
            return redirect(route('movies.index'))->with('error', 'Movie can not be rented!');
        }
        $user = Auth::user();
        $user->credit = $user->credit - $movie->price;
        $user->save();
        return redirect(route('movies.index'))->with('success', 'Movie rented successfully');
    }

    public function return(Movie $movie)
    {
        $movie->user_id = null;
        if (!$movie->save()) {
            return redirect(route('movies.index'))->with('error', 'Movie can not be returned!');
        }
        return redirect(route('movies.index'))->with('success', 'Movie returned successfully');
    }
}
