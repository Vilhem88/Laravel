<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\View;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = Post::find(3);
        // i dvete methodi moze da primaaat ili edna ili array od vrednosti // 
        // $post->categories()->attach(7);
        // $post->categories()->detach(4);
        // // sync prima array od vrednosti
        $post->categories()->sync([1,2,3,4]);
        return $post;


        // $posts = Post::whereHas('comments', function (Builder $query){
        //     $query->where('body', 'like', '%comment%');
        // })->get();

        // $posts = Post::whereDoesntHave('comments', function (Builder $query){
        //         $query->where('body', 'like', '%comment%');
        //     })->get();

        // return  $posts;

        // $posts = Post::doesntHave('comments')->get();
        // $posts = Post::has('comments')->get();
        // return $posts;

        // $posts = Post::withCount('comments')->get();
        // return  $posts;


        // $comment = Comment::with('posts', 'views')->get();
        // return $comment->post;

        //    $posts = Post::all();
        //    return view('index', compact('posts'));

        // $post = Post::find(1);
        // return  $post->comments()->where('body', 'like', '%comment%')->get();

        // $category = Category::get();
        //     return $category->posts;
        


        // $posts = Post::with('comments', 'views', 'categories')->get();
        // return view('index', compact('posts'));

        // $post = Post::first();
        // $post->comments;
        // return  $post;



        // $view = View::with('post')->first();
        // return $view;


        // $posts = Post::all();
        // foreach ($posts as $post) {
        //     echo $post->title . '/';
        //     echo $post->content . '/';
        //     echo $post->views->count . '/ <br>';
        // }
        // return;



        //  $posts = Post::with('views')->get();
        //  return $posts;
        //  $posts = Post::first();
        //  return $posts->views->count;

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
    public function store(Request $request)
    {
        //
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
