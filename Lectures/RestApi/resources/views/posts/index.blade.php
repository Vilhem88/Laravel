@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="card my-5">
    <div class="card-header">
      List posts
    </div>
    <div class="card-body">
        <div class="alert alert-success" style="display: none" role="alert"></div>
        <div class="alert alert-danger" style="display: none"  role="alert"></div>
          <p></p>
          <p class="mb-0"></p>
        </div>
          <table class="table table-hover" id="postsTbl">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Description</th>
                    <th>Author</th>
                    <th></th>
                </tr>
            </thead>
          </table>
  </div>    
  <div class="modal" tabindex="-1" id="deletePostModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete Post</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure, you want to delete this item?</p>
          <input type="hidden" name="postId" id="postId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary confirmBtn">Confirm</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
@include('scripts.script')
@endsection
