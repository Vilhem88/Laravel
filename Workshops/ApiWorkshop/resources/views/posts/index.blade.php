@extends('layouts.master')

@section('content')
    <div class="card">
        <h6 class="card-header text-center">List Posts</h6>
        {{-- Two divs with d-none for message --}}
        <div class="d-flex justify-content-center">
            <div class="alert alert-success mt-2 text-center col-4" style="display: none"></div>
            <div class="alert alert-danger mt-2 text-center col-4" style="display: none"></div>
        </div>
        <div class="card-body my-5">
            <div class="card-body">
                {{-- ID on table --}}
                <table class="table" id="postsTbl" style="width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Content</th>
                            <th scope="col">Author</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    {{-- -- Modal -- --}}
    {{-- add ID on the Modal --}}
    <div class="modal" tabindex="-1" id="deletePostModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- in the modal-body add input hidden --}}
                    <input type="hidden" name="postId" value="" id="postId">
                    <p>Are you sure you want to delete this item?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- on the button confirm class for listener --}}
                    <button type="button" class="btn btn-primary confirmBtn">Confirm</button>
                </div>
            </div>
        </div>
    </div>
@endsection
