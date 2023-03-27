@extends('master')

@section('content')
    <div>
        @if (Route::has('login'))
            @auth
                <div>
                    <x-app-layout>

                    </x-app-layout>
                </div>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth

        @endif
    </div>
    <div class="container">
        <div class="row">
            <div class="col-10">
                <ul class="list-group">
                    <li class="list-group-item btn btn-primary"><a href="{{ route('admin.create') }}">Add new Doctor</a>
                    </li>
                    <li class="list-group-item btn btn-primary"><a href="{{ route('admin.list') }}">List all</a>
                    </li>
                    <li class="list-group-item btn btn-primary"><a href="{{ route('admin.appointment') }}">All Appointments</a>
                    </li>
                </ul>
               
            </div>
        </div>
    </div>

    @endsection