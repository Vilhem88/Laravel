@extends('layouts.master')

@section('title', 'Edit employee')

@section('content')
    <form action="{{ route('company.employee.update', [$company->id, $employee->id])}}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$employee->name}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" name="email" value="{{$employee->email}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{$employee->phone}}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
  
@endsection
