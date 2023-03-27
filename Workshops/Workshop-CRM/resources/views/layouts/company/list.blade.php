@extends('layouts.master')

@section('title', 'Company')

@section('content')

    <table class="table border bg-light  mt-5">
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session::get('error') }}</div>
        @endif
        <h4 class="text-center mt-5">Registered Companies : {{ $companies->count() }}</h4>
        <a href="{{ route('company.create') }}" class="btn btn-primary">+ Add company</a>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Logo</th>
                <th scope="col">Website</th>
                <th scope="col">Country</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->logo }}</td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->country }}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route('company.edit', $company->id)}}">Edit</a>
                    </td>
                    <td >
                        <a class="btn btn-sm  btn-success" href="{{route('company.employee.index', $company->id)}}">View employees</a>
                    </td>
                    <td>
                        <form action="{{route('company.destroy', $company->id)}}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-sm btn-danger" type="submit"> Delete </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection
