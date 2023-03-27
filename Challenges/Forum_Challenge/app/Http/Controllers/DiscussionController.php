<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentFormRequest;
use App\Http\Requests\DiscussionFormRequest;
use App\Models\Post;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discussions = Discussion::get();
        return view('welcome', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('dashboard', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DiscussionFormRequest $request)
    {
        // dd($request->category);
        $discussion = new Discussion();
        $discussion->title = $request->title;
        $img = $request->file;
        $img_name = date('mdYHis') . uniqid() . '.' . $img->getClientOriginalExtension();
        $request->file->move('pictures', $img_name);
        $discussion->image = $img_name;
        $discussion->category_id = Category::where('id', $request->category)->first()->id;
        $discussion->description = $request->description;
        $discussion->user_id = Auth::user()->id;

        if (!$discussion->save()) {
            return redirect()->route('dashboard')->with('error', 'Something went wrong!');
        }

        return redirect()->route('dashboard')->with('success', 'A new discussion has been created!');
    }

    /**
     * Display the specified resource.
     */

    // Display all comments
    public function comments(Discussion $discussion)
    {
        $comments = Post::where('discussion_id', $discussion->id)->get();

        return view('comments.allComments', compact('comments', 'discussion'));
    }


    public function commentar(Discussion $discussion)
    {

        return view('comments.comment', compact('discussion'));
    }

    public function post(CommentFormRequest $request)
    {

        $comment = new Post();
        $comment->comment = $request->comment;
        $comment->discussion_id = Discussion::where('id', $request->slug)->first()->id;
        $comment->user_id = Auth::user()->id;


        if (!$comment->save()) {
            return redirect()->route('discussion.index')->with('error', 'Something went wrong!');
        }

        return redirect()->route('discussion.index')->with('success', 'A new comment has been created!');
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
    public function destroy(Post $post)
    {
        // dd($post);

         if (!$post->delete()) {
            return redirect()->route('discussion.index')->with('error', 'An error happened!');
        }
        return redirect()->route('discussion.index')->with('success', 'deleted successfully!');
        
    }
}
