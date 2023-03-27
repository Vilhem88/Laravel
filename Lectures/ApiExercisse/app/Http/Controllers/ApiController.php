<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ApiController extends Controller
{

    public function getPosts()
    {

        // zemame data od baza
        $posts = Post::with('user')->get();
        return  DataTables::of($posts)
            // action is column name in the table
            ->addColumn('action', function ($row) {
                // for every row call this method, on delete button add class name because we want to add on click listener
                // we are adding data-id attribute to the delete button, in $row we have every single post
                return  '<button class="btn btn-link text-danger deleteBtn" data-id="' . $row->id . '">Delete</button>';
            })
            ->addColumn('title', function ($row) {
                // in web registering a new route 
                return '<a href="' . route('posts.show', $row->id) . '">' . $row->title . '</a>';
            })

            // here returning the column name/values 
            ->rawColumns(['action', 'title'])
            ->make(true);
    }

    // delete method

    public function destroy(Post $post)
    {

        if ($post->delete()) {

            return response()->json(['success' => true, 'message' => 'Successfully deleted']);
        }
        return response()->json(['error' => true, 'message' => 'An error has occurred']);
    }

    
    public function getDetails(Post $post)
    {
        $post = Post::where('id', $post->id)->with('user', 'comments', 'comments.user')->first();

        if ($post) {
            return response()->json(['success' => true, 'post' => $post]);
        }
        return response()->json(['error' => true, 'message' => 'An error has occurred']);
    }

    public function leaveComment(Request $request, Post $post)
    {

        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();

        if ($comment->save()) {
            return response()->json(['success' => true, 'comment' => $comment]);
        }
        return response()->json(['error' => true, 'message' => 'An error has occurred']);
    }
}
