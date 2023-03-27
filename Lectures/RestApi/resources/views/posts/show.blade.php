@extends('layouts.master')

@section('content')
    <input type="hidden" name="postId" id="postId" value="{{ $post->id }}">
    <div class="card my-5">
        <div class="card-header">
            List posts
        </div>
        <div class="card-body">
            <div class="alert alert-success my-3" style="display: none" role="alert"></div>
            <div class="alert alert-danger my-3" style="display: none" role="alert"></div>
            <div class="text-center">
                <img src="{{ asset('img/loader.gif') }}" alt="loader" style="width: 20%" class="loader">
            </div>
            <div class="card-info" style="display: none">
                <div class="row">
                    <div class="col-2">
                        <p>Title</p>
                    </div>
                    <div class="col-10">
                        <h6 class="title"></h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p>Content</p>
                    </div>
                    <div class="col-10">
                        <h6 class="content"></h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p>Description</p>
                    </div>
                    <div class="col-10">
                        <h6 class="description"></h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2">
                        <p>Author</p>
                    </div>
                    <div class="col-10">
                        <h6 class="author"></h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <h6 class="mt-5">Comments</h6>
                        <div class="comments"></div>
                        <div class="mb-2">
                            <label for="floatingTextarea">Leave a comment</label>
                            <textarea id="leaveComment" class="form-control mt-2" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                        </div>
                        <button class="btn btn-primary  commentBtn">Save</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @include('scripts.script')
@endsection
