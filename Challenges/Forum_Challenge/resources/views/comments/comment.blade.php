@extends('master')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-8 offset-2">
                <a href="{{ route('discussion.index') }}">back</a>
                <form action="{{url('commentar/'.Str::slug($discussion->id))}}" method="post">
                    @csrf
                    <div class="form-floating">
                        <textarea class="form-control @error('comment') is-invalid
                            
                        @enderror" placeholder="Leave a comment here" id="floatingTextarea" name="comment"  :value="old('comment')"></textarea>
                        @error('comment')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <label for="floatingTextarea">Comment</label>
                        
                    </div>
                    <button class="btn btn-primary mt-3">Post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
