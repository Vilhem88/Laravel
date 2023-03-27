@extends('layouts.master')

@section('content')
    @if (Session::has('success'))
        <div class="my-3 alert alert-success">{{ Session::get('success') }}</div>
    @endif
    @if (Session::has('error'))
        <div class="my-3 alert alert-danger">{{ Session::get('error') }}</div>
    @endif
    <div class="card">
        <h3 class="card-header text-center">
            Movie Library
        </h3>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Genre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <th scope="row">{{ $movie->id }}</th>
                        <td>{{ $movie->title }}</td>
                        <td>${{ $movie->price }}</td>
                        <td>
                            @foreach ($movie->genres as $genre)
                                {{ $genre->name }},
                            @endforeach
                        </td>
                        <td class="text-center">
                        @if (Auth::user()->isAdmin())
                                <a class="text-info text-decoration-none"
                                    href="{{ route('movies.edit', $movie->id) }}">edit</a>
                                <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-link text-danger text-decoration-none">delete</button>
                                </form>
                            @else
                            @empty($movie->user_id)
                                <a class="text-info text-decoration-none" href="{{ route('movies.rent', $movie->id) }}">rent</a>
                                @elseif($movie->user_id == Auth::id())
                                <a class="text-warning text-decoration-none" href="{{ route('movies.return', $movie->id) }}">return</a>
                                @else
                                <p class="text-danger">Not available</p>
                            @endempty
                        </td>
                    @endif
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
