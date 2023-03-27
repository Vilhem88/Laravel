@extends('layouts.master')

@section('title', 'Employees')

@section('content')

    <table class="table border bg-light  mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <h4 class="text-center mt-5">Employees: {{$company->name}}</h4>
        <a href="{{ route('company.employee.create', $company->id)}}" class="btn btn-primary">+ Add employee</a>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Company Name</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody> 

                @foreach ($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$company->name}}</td>
                    <td>
                        <a class="btn btn-link btn-primary" href="{{route('company.employee.edit', [$company->id, $employee->id])}}">Edit</a>
                        <form action="{{route('company.employee.destroy', [$company->id, $employee->id])}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-link text-danger" type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
    </div>
@endsection 
