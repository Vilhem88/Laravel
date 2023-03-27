@extends('master')
@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('discussion.index')" :active="request()->routeIs('discussion.index')">
                {{ __('Home') }}
            </x-nav-link>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-center">List of all Discussions</h1>
                        @foreach ($discussions as $discussion)
                            <section class="text-center border">
                                <div class="row py-lg-5">
                                    <div class="col-lg-6 col-md-8 mx-auto">
                                        <img src="../pictures/{{ $discussion->image }}" class="card-img-top" alt="...">
                                        <hr class="border border-primary border-3 opacity-75">
                                        <div class="card-body">
                                            <h5 class="card-title">Category: {{ ucfirst($discussion->category->title) }}
                                            </h5>
                                            <hr class="border border-primary border-3 opacity-75">
                                            <h6 class="card-title">Title: {{ ucfirst($discussion->title) }}</h6>
                                            <p class="card-text">Description: {{ ucfirst($discussion->description) }}</p>
                                            <p class="card-text">User: {{ ucfirst($discussion->user->name) }} Created at:
                                                {{ $discussion->created_at }}</p>
                                            <h6 class="card-text text-secondary">Status: {{ $discussion->status }}</h6>
                                            @if ($discussion->status == 'not approved')
                                                <a href="{{ route('admin.approve', $discussion->id) }}"
                                                    class="btn btn-primary">Approve</a>
                                                <a href="{{ route('admin.edit', $discussion->id) }}"
                                                    class="btn btn-warning">Edit</a>
                                            @else
                                                <span class="text-danger">Approved</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endforeach

                    </div>
                </div>
            </div>
        @endsection
