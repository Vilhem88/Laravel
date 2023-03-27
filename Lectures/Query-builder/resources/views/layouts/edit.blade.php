@extends('layouts.master')

@section('title', 'Edit movie')

@section('content')
    <form action="{{ route('movies.update', $movie->id) }}" method="post">
        @csrf
        @method('PUT')
       
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="title" class="form-control" name="title" value="{{ $movie->title }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input type="text" class="form-control" name="description" value="{{ $movie->description }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Duration</label>
            <input type="text" class="form-control" name="duration" value="{{ $movie->duration }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Genre</label>
            <select name="genre" class="form-control" id="genre">
                @foreach ($genres as $genre)
                    {   

                    <option value="{{ $genre->id }}" @if ($movie->genre_id == $genre->id) selected @endif>
                        {{ $genre->name }}</option>
                    }
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
  
@endsection
