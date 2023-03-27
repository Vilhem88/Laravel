@extends('layouts.master')

@section('title', 'List movies')


@section('content')

    <table class="table border bg-light  mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <h4 class="text-center mt-5">All movies we have: {{ $movies->count() }}</h4>
        <a href="{{ route('movies.create') }}" class="btn btn-primary">Add movie</a>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Duration</th>
                <th scope="col">Genre</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <th scope="row">{{ $movie->id }}</th>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->duration }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td>
                        <a class="btn btn-link btn-primary" href="{{ route('movies.edit', $movie->id) }}">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-link text-danger" type="submit">
                                @if ($movie->deleted_at != null)
                                Restore
                                @else
                                Delete
                                @endif
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $movies->links() }}

    </div>
@endsection
