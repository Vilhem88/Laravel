@extends('layouts.master')

@section('title', 'Add new employee')

@section('content')
    <h1 class="text-center mt-5">Add a new employee!</h1>
    <form action="{{ route('company.employee.store', $company->id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
