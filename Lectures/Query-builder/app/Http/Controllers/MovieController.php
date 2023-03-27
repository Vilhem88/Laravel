<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // --------------- Eloquent -------------------- //

        // $count = Movie::count();
        $movies = Movie::join('genres', 'genres.id', 'movies.genre_id')
            ->select('movies.*', 'genres.name as genre')
            ->withTrashed()
            ->orderBy('id')
            ->paginate(7);
            // ->get();
        // ->withThrushed() ke gi zeme site filmovi i izbrisani i postoecki
        return  view('layouts.table', compact('movies'));
        //   $movies = Movie::get();
        //   dd($movies);

        // --------------  Query --------------------- //


        // $count = DB::table('movies')->count();
        // $movies = DB::table('movies')
        //     ->join('genres', 'movies.genre_id', 'genres.id')
        //     ->select('movies.*', 'genres.name as genre')
        //     ->orderBy('id')
        //     ->paginate(5);


        // bilo kolku uslovi da imame gi dodavame so where('duration', '>', 100 )
        // ili moze i vaka vo array da gi stavime
        // where([
        // ['duration', '>', 100],
        // ['duration', '<', 500]
        // ])
        // za dodavanje na OR, povikuvame orWhere i uslovite gi povikuvame sekogas po redosled kako treba da bidat povikuvani
        // $movies = DB::table('movies')
        // ->join('genres', 'movies.genre_id','genres.id')
        // ->where('duration', '>', 100 )
        // ->select('movies.*', 'genres.name as genre')
        // ->orderBy('movies.duration', 'asc')
        // ->get();
        // $movies = DB::table('movies')->get();

        // $max = DB::table('movies')->max();
        // $min = DB::table('movies')->min();
        // $avg = DB::table('movies')->avg();

        // $movies = DB::table('movies')->select('id', 'title', 'description')->get();
        // $movies = DB::table('movies')->find(3);
        // $movies = DB::table('movies')->first();
        // $movies = DB::table('movies')->pluck('title', 'id');
        // $movies = DB::table('movies')->get();
        // $movies = DB::table('movies')->toSql();
        // dd($movies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::get();
        return  view('layouts.create', compact('genres'));
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
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->genre_id = $request->genre;
        
        if ($movie->save()) {
            
            return redirect('/movies')->with('success', 'New movie created successfully');
        }
        
        return redirect('/movies')->with('error', 'The specified resource does not exist');

        // pravilo za validacija za koga prakame na id od druga tabela 'exists: imeto na tabelata na pr. genres, i kolonata koja sakame da pratime na pr. 'id'. => 'exists: genres,id';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('layouts.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {

        // $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->description = $request->description;
        $movie->duration = $request->duration;
        $movie->genre_id = $request->genre;

        if ($movie->save()) {

            return redirect('/movies')->with('success', 'New movie edited successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        
        
        if ($movie) {
            if ($movie->delete()) {
                return redirect('/movies')->with('success', 'Movie deleted successfully');
            }
        }
        
        $movie = Movie::withTrashed()->find($id)->restore();
       
        return redirect('/movies')->with('success', 'Movie restored successfully');
        return redirect('/movies')->with('error', 'The specified resource does not exist');
    }
}
