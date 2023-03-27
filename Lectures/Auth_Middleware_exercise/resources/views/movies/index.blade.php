@extends('layouts.master')

@section('content')
    <div class="card my-5">
        <div class="card-header d-flex justify-content-evenly">
            <span >List Moive</span>
           <p>Count: <span id="movies-count"></span></p> 
        </div>
       
        <div class="card-body">
            <div class="alert alert-success my-3"  @if (!Session::has('success')) style="display: none;" @endif> @if (Session::has('success')) {{ Session::get('success') }} @endif</div>
        
                <div class="alert alert-danger my-3"  @if (!Session::has('error')) style="display: none;" @endif>@if (Session::has('error')) {{ Session::get('error') }} @endif</div>
            
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Cost</th>
                    <th scope="col">Genre</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <th scope="row">{{ $movie->id }}</th>
                        <td>{{ $movie->title }}</td>
                        <td>${{ $movie->cost }}</td>
                        <td>
                            @foreach ($movie->genres as $genre)
                                {{ $genre->name }} <br>
                            @endforeach
                        </td>
                        <td>
                            @if (Auth::user()->isAdmin())
                                <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-primary">Edit</a>
                                {{-- <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form> --}}
                                <button class="btn btn-sm mt-2 btn-danger deleteMovieBtn" data-id="{{ $movie->id }}">Delete</button>
                            @else
                            @empty($movie->user_id)
                                <a href="{{ route('movies.rent', $movie->id) }}" class="text-success">Rent</a>
                            @elseif ($movie->user_id == Auth::id())
                                <a href="{{ route('movies.return', $movie->id) }}" class="text-info">Return</a>
                            @else
                                <p class="text-danger">Not available</p>
                            @endempty
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal" id="deleteMovieModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Delete movie</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are your sure?</p>
          <input type="hidden" name="movieId" id="movieId" value="">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary confirmBtn">Confrim</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $.ajax({
            url: 'api/movies/count',
            type: 'GET',
            success: function(data){
              $('#movies-count').text(data.count);
            },
            error: function(error){
                console.log('Error',error);
            }
        })

        $('.deleteMovieBtn').on('click', function(){
            $('#deleteMovieModal #movieId').val($(this).attr('data-id'));
            $('#deleteMovieModal').modal('show');
        })

        $('#deleteMovieModal .confirmBtn').on('click', function () {
            $.ajax({
                url: '/api/movies/' +  $('#deleteMovieModal #movieId').val(),
                method: 'DELETE',
                data: {'_token': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if(data.success){
                        $('#deleteMovieModal').modal('hide');
                        $('.alert-success').text(data.success).show();
                    }else{
                        $('#deleteMovieModal').modal('hide');
                        $('.alert-danger').text(data.error).show();

                    }
                },
                error: function(error){
                console.log('Error', error);
            }
            })
        })


    })
</script>
@endsection
