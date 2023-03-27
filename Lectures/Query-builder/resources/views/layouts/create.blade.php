@extends('layouts.master')

@section('title', 'Create movie')
    
@section('content')
<h1 class="text-center mt-5">Add a new movie!</h1>
    <form action="{{route('movies.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="title" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description">
        </div>
        <div class="mb-3">
            <label class="form-label" >Duration</label>
            <input type="text" class="form-control" name="duration">
        </div>
        <div class="mb-3">
            <label class="form-label" >Genre</label>
            <select name="genre"  class="form-control" id="genre" >
                @foreach ( $genres as $genre){

                    <option value="{{$genre->id}}">
                        {{$genre->name}}
                    </option>
                }
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
