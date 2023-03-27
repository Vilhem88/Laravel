@extends('layouts.master')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Subtitle</th>
                <th scope="col">Description</th>
                @if (Auth::user()->isAdmin())
                    <th scope="col">Action</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($cards as $card)
                <tr>
                    <th scope="row">{{ $card->id }}</th>
                    <td>{{ $card->title }}</td>
                    <td>{{ $card->subtitle }}</td>
                    <td>{{ $card->description }}</td>
                    @if (Auth::user()->isAdmin())
                        <td>
                            <a href="">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    @endif
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
