<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ApiController extends Controller
{

    //----- SHOW TABLE METHOD -----//

    public function getPosts()
    {
        $posts = Post::with('user')->get();

        return DataTables::of($posts)
            ->addColumn('action', function ($row) {

                return  '<button class="btn btn-link text-danger deleteBtn" data-id="' . $row->id . '">Delete</button>';
            })
            ->addColumn('title', function($row){
                return '<a href="' . route('posts.show', $row->id) . '">' . $row->title . '</a>';
            })

            ->rawColumns(['action', 'title'])
            ->make(true);
    }

    //----- SHOW POST METHOD -----//

    public function show(Post $post){

        $post = Post::where('id', $post->id)->with('user', 'comments', 'comments.user')->first();
        if($post){
            return response()->json(['success' => true, 'post' => $post]);

        }

        return response()->json(['error' => true, 'message' => 'Post could not be find']);

    }

    //----- STORE POST-COMMENT METHOD -----//

    public function store(Request $request, Post $post){

        $comment = new Comment();
        $comment->body = $request->comment;
        $comment->post_id = $post->id;
        $comment->user_id = Auth::id();

        if($comment->save()){
            return response()->json(['success' => true, 'comment' => $comment]);

        }

        return response()->json(['error' => true, 'message' => 'Post could not be find']);




    }


    //----- DELETE POST METHOD -----//


    public function destroy(Post $post){

        if($post->delete()){

            return response()->json(['success' => true, 'message' => 'Post deleted successfully.']);

        }

        return response()->json(['error' => true, 'message' => 'Post could not be deleted']);

    }


}
