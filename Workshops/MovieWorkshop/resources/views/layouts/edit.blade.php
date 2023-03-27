@extends('layouts.master')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            Movie Edit
        </div>
        <div class="card-body">

            <form action="{{ route('movies.update', $movie->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="" class="form-label">Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $movie->title)}} " name="title">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price', $movie->price) }}">
                        
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Genres</label>
                    <select name="genres[]" id="genres" class="form-control"
                        multiple="multiple">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" @if (in_array($genre->id, $movie->genres()->pluck('genre_movie.genre_id')->toArray())) selected @endif>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#genres').select2();
        })
    </script>
@endsection
