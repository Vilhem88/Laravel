@extends('master')
@section('content')
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
            <x-nav-link :href="route('discussion.index')" :active="request()->routeIs('discussion.index')">
                {{ __('Home') }}
            </x-nav-link>
        </div>
        <div>
           
        </div>
    @endsection
