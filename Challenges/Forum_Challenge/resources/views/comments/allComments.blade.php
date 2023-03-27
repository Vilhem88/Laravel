@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <a href="{{ route('discussion.index') }}">back</a>
                <table class="table table-hover">
                    <tr>
                        <th>Discussion Name</th>
                        <th>Comment</th>
                        <th>User name</th>
                        <th>Created at</th>
                        <th></th>
                    </tr>
                    @if (!empty($comments))
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{ $discussion->title }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>{{ $comment->user->name }}</td>
                                <td> {{ $comment->created_at }}</td>
                                <td>
                                    @if (Auth::user() != null && $comment->user_id == Auth::user()->id)
                                       <a href="">edit</a>
                                       <form action="{{ route('commentar.delete', $comment->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link ">delete</button>
                                    </form>
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>



@endsection
