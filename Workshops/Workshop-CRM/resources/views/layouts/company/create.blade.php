@extends('layouts.master')

@section('title', 'Create company')
    
@section('content')
<h1 class="text-center mt-5">Add a new company!</h1>
    <form action="{{route('company.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label" >Logo</label>
            <input type="text" class="form-control" name="logo">
        </div>
        <div class="mb-3">
            <label class="form-label" >Website</label>
            <input type="text" class="form-control" name="website">
        </div>
        
        <div class="mb-3">
            <label class="form-label" >Country</label>
            <select name="country"  class="form-control">

                @foreach ( $countries as $country )
                    <option value="{{ $country->id}}">
                      {{ $country->name }}
                    </option>
                    @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
