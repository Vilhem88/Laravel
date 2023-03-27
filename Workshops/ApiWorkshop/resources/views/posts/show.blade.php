@extends('layouts.master')

@section('content')
    {{-- add input hidden --}}
    <input type="hidden" name="postId" id="postId" value="{{ $post->id }}">
    <div class="card">
        <h5 class="card-header text-center">List Posts</h5>
        <div class="d-flex justify-content-center">
            {{-- Two divs with d-none for message --}}
            <div class="alert alert-success mt-2 text-center col-4" style="display: none"></div>
            <div class="alert alert-danger mt-2 text-center col-4" style="display: none"></div>
        </div>
        <div class="card-body">
            <div class="text-center">
                <img src="{{ asset('img/loader.gif') }}" alt="loader" class="loader" style="width: 35%;">
            </div>
            <div class="card-info" style="display: none">
                <div class="row">
                    <div class="col-2">
                        <p>Title:</p>
                    </div>
                    <div class="col-8">
                        <p class="title"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p>Content:</p>
                    </div>
                    <div class="col-8">
                        <p class="content"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p>Description:</p>
                    </div>
                    <div class="col-8">
                        <p class="description"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p>Author:</p>
                    </div>
                    <div class="col-8">
                        <p class="author"></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h6 class="mt-5">Comments</h6>
                        <div class="comments"></div>
                        <div class="mb-2">
                            <label for="floatingTextarea">Leave a comment</label>
                            <textarea id="leaveComment" name="leaveComment" class="form-control mt-2" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        </div>
                        <button class="btn btn-primary commentBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
