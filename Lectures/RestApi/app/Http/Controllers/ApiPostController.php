<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ApiPostController extends Controller
{
    public function getPosts()
    {
        $posts = Post::with('user')->get();
        return DataTables::of($posts)
            ->addColumn('action', function ($row) {

                return '<button class="btn btn-danger deleteBtn" data-id="' . $row->id . '">Delete</button>';
            })
            ->addColumn('title', function ($row) {
                return '<a href="' . route('posts.show', $row->id) . '">' . $row->title . '</a>';
            })
            ->rawColumns(['action', 'title'])
            ->make(true);
    }

    public function destroy(Post $post)
    {
        if ($post->delete()) {
            return response()->json(['success' => true, 'message' => 'Post deleted successfully']);
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


    public function leaveComment(Request $request, $post_id){

        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->post_id = $post_id;
        $comment->user_id = Auth::id();
        
        if($comment->save()){
            return response()->json(['success' => true, 'comment' => $comment]);
        }
        return response()->json(['error' => true, 'message' => 'An error has occurred']);

    
    
    
    
    
    }








}
