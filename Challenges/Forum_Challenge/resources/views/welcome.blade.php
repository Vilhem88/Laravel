@extends('master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">

                <h1 class="mt-5">Welcome to the Forum</h1>
                <div class="mt-5">
                    <ul>
                        <li>
                            <a class="btn btn-large btn-secondary" href="{{ route('dashboard') }}">Add a new Discussion</a>
                        </li>
                        @if (Auth::user() == null || Auth::user()->role_id != 1)
                
                            <h1 class="text-center">List of all Discussions</h1>
                 
                        @else
                        <a class="btn btn-large btn-primary m-3" href="{{ route('admin.show') }}">Show Discussion</a>
                        @endif
                    </ul>


                </div>
               
                @if (!empty($discussions))
                    @foreach ($discussions as $discussion)
                        @if ($discussion->status == 'approved')
                            <div class="text-center d-inline-flex border col-2">
                                <div class="row">
                                    <div class="mb-5">
                                        <img src="../pictures/{{ $discussion->image }}" class="card-img-top" alt="...">
                                        <hr class="border border-primary border-3 opacity-75">
                                        <div class="card-body">
                                            <h5 class="card-title">Category: {{ ucfirst($discussion->category->title) }}
                                            </h5>
                                            <hr class="border border-primary border-3 opacity-75">
                                            <h6 class="card-title">Title: {{ ucfirst($discussion->title) }}</h6>
                                            <p class="card-text">Description: {{ ucfirst($discussion->description) }}
                                            </p>
                                            <p class="card-text">User: {{ ucfirst($discussion->user->name) }} Created
                                                at: {{ $discussion->created_at }}</p>
                                                <a href="{{route('discussion.comments', $discussion->id)}}">See all comments</a>
                                                <a href="{{route('discussion.commentar', $discussion->id)}}">Leave a Comment</a>
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                        @endif
                    @endforeach
                @else
                    <div class="h3 mt-5"> Nothing to see here yet.</div>
                @endif
            </div>
        </div>
    </div>
@endsection
