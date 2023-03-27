@extends('layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card my-5">
        <div class="card-header">
            Create Moive
        </div>
        <div class="card-body">
            <form action="{{ route('movies.update', $movie->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid
                    @enderror" name="title" value="{{ old('title', $movie->title) }}">
                    @error('title')
                    <div class="invalid-feedback">{{$message}}</div>    
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Cost</label>
                    <input type="number" class="form-control @error('cost') is-invalid
                    @enderror" name="cost" value="{{ old('cost', $movie->cost)}}">
                    @error('cost')
                    <div class="invalid-feedback">{{$message}}</div>    
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genres[]" id="genres" class="form-control  @error('genres') is-invalid
                    @enderror" multiple="multiple">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id}}" @if (in_array($genre->id,$movie->genres()->pluck('genre_movie.genre_id')->toarray())) selected
                                
                            @endif>{{$genre->name}}</option>
                        @endforeach
                    </select>
                    @error('genres')
                    <div class="invalid-feedback">{{$message}}</div>    
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#genres').select2()
        })
    </script>
@endsection
