<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Forum Main Page') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                @include('sessions')
                            </div>
                        </div>
                    </div>
                  
                    <form method="POST" action="{{ route('discussion.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" autofocus autocomplete="title" />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div class="mt-4">
                            <label for="file" :value="__('Image')" />
                            <input id="file" class="block mt-1" type="file" name="file"
                                :value="old('file')" />
                            <x-input-error :messages="$errors->get('file')" class="mt-2" />
                        </div>

                        <div class="form-floating mt-4">
                            <p>Description</p>
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                                name="description" :value="old('description')"></textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Category')" />
                            <select class="block mt-1 w-full" name="category" id="">
                                <option value="">Please select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>
                        <button class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
