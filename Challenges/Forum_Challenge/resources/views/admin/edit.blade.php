@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 offset-2">
                <div class="">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <form method="POST" action="{{ route('admin.update', $discussion->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title', $discussion->title)" autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2 text-red-600" />
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <label for="file" :value="__('Image')" />
                            <input id="file" class="block mt-1" type="file" name="file" :value="old('file')" />
                            <img src="{{ asset('../pictures/' . $discussion->image) }}" alt="" width="270px"
                                height="270px">

                            <x-input-error :messages="$errors->get('file')" class="mt-2 text-red-600" />
                        </div>

                        <div class="flex justify-center">
                            <div class="relative mb-3 xl:w-96" data-te-input-wrapper-init>
                                <label>Description</label>

                                <textarea
                                name="description" rows="3" placeholder="Your message"> {{ old('description', $discussion->description) }}</textarea>

                                <x-input-error :messages="$errors->get('description')" class="mt-2 text-red-600" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Category')" />
                            <select class="block mt-1 w-full" name="category" id="">
                                <option value="">Please select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id === $discussion->category->id) selected @endif>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2 text-red-600" />
                        </div>
                        <button class="btn btn-primary mt-5">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
