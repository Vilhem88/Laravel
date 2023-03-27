<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
@yield('css')
    </head>

<body>
    <nav class="navbar navbar-expand-lg me-auto bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="{{route('movies.index')}}">Movies</a>
                    @if (Auth::user()->isAdmin())
                    <a class="nav-link active" href="{{route('movies.create')}}">Create new movie</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                            <button class="btn btn-link nav-link text-decoration-none text-danger ">Logout</button>
                    </form>
                </div>
            </div>
            <h6 class="navbar-text text-primary">{{ Auth::user()->first_name }}-available credit: ${{Auth::user()->credit }} </h6>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row">
            <div class="col-10">
              @yield('content')
            </div>
        </div>
    </div>

    @yield('scripts')
    <script>
      
    </script>
</body>

</html>
