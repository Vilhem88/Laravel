@extends('master')


@section('content')
    

    <div class="container">
        <div class="row">
            <div class="col">
                <h2 class="text-center m-5">Add a new doctor</h2>
                <a class="btn btn-primary " href="{{route('home.index')}}">Home</a>
                <a class="btn btn-primary " href="{{route('admin.list')}}">List</a>

                @include('sessions')
                
                <form class="w-50 m-auto" action="{{ route('admin.store') }}" method="post"> 
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }} </div>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" name="phone" class="form-control @error('phone')is-invalid @enderror"
                            value="{{ old('phone') }}">
                        @error('phone')
                        <div class="invalid-feedback">{{ $message }} </div>

                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Specialisation</label>
                        <input type="text" class="form-control  @error('specialisation') is-invalid @enderror"
                        value="{{ old('specialisation') }}" name="specialisation">
                        @error('specialisation')
                        <div class="invalid-feedback">{{ $message }} </div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection