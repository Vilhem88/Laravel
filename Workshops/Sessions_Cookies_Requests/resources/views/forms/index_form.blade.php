<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <main>
   
            <div class="col col-6 m-auto mt-5">
                <h2 class="text-center">Book Store</h2>
                <form class="mt-5" action="{{ route('form.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text"
                            class="form-control @error('title') is-invalid
                        @enderror"
                            name="title" value="{{ old('title') }}">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <p>Description</p>
                        <textarea class="form-control @error('desc') is-invalid
                        @enderror" value="{{old('desc')}}" name="desc"></textarea>
                        @error('desc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label ">Your photo URL</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                            <input type="text"
                                class="form-control @error('url') is-invalid
                            @enderror"
                                name="url" aria-describedby="basic-addon3" value="{{ old('url') }}">
                        </div>
                        @error('url')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control @error('post') is-invalid
                        @enderror" placeholder="Post here"
                            name="post" value="{{ old('post') }}"></textarea>
                        <label for="floatingTextarea">Post</label>
                        @error('post')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">First and last name</span>
                        <input type="text" aria-label="First name"
                            class="form-control @error('firstName') is-invalid
                        @enderror"
                            name="firstName" value="{{ old('firstName') }}">
                        @error('firstName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" aria-label="Last name"
                            class="form-control @error('lastName') is-invalid
                        @enderror"
                            name="lastName" value="{{ old('lastName') }}">
                        @error('lastName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input-group mb-3 ">
                        <label for="" class="form-label">Date:</label>
                        <input class="@error('date') is-invalid
                        @enderror" type="date"
                            style="margin-left: 10px" name="date" value="{{ old('date') }}">
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
