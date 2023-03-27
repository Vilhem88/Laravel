<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\DiscussionFormRequest;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show()
    {
        $discussions = Discussion::get();
        return view('admin.list', compact('discussions'));
    }


    public function approve(Discussion $discussion)
    {
        $discussion = Discussion::find($discussion->id);
        $discussion->status = 'approved';

        if (!$discussion->save()) {

            return redirect()->back()->with('error', 'An error happened!');
        }

        return redirect()->back()->with('success', 'Approved successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Discussion $discussion)
    {

        $categories = Category::get();
        return view('admin.edit', compact('discussion', 'categories'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(DiscussionFormRequest $request, Discussion $discussion)
    {


        $discussion->title = $request->title;
        if (request()->hasFile('file') && request('file') != '') {
            $imagePath = public_path('pictures/' . $discussion->image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $img = $request->file;
            $img_name = date('mdYHis') . uniqid() . '.' . $img->getClientOriginalExtension();
            $request->file->move('pictures', $img_name);
            $discussion->image = $img_name;
        }
        $discussion->category_id = Category::where('id', $request->category)->first()->id;
        $discussion->description = $request->description;
        $discussion->user_id = Auth::user()->id;

        if (!$discussion->save()) {
            return redirect()->route('admin.show')->with('error', 'Something went wrong!');
        }

        return redirect()->route('admin.show')->with('success', 'A discussion has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
