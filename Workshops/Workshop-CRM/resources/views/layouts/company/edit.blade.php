@extends('layouts.master')

@section('title', 'Edit company')

@section('content')
    <form action="{{ route('company.update', $company->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Company Name</label>
            <input type="text" class="form-control" name="name" value="{{ $company->name }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{ $company->email }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Logo</label>
            <input type="text" class="form-control" name="logo" value="{{ $company->logo }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Website</label>
            <input type="text" class="form-control" name="website" value="{{ $company->website }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Country</label>
            <select name="country" class="form-control">

                @foreach ($countries as $country)
                    <option
                        value="{{ $country->id }}" @if($company->country_id == $country->id) selected @endif>
                    {{ $country->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection
