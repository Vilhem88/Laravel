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
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <h2 class="text-center m-5">Movies List</h2>
                <form method="post" action="{{route('movie.store')}}">
                    @csrf
                    <div class="mb-3">
                      <label  class="form-label">Title</label>
                      <input type="text" class="form-control" name="title"> 
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Start-date</label>
                        <input type="date" class="form-control" name="start_date"> 
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">End-date</label>
                        <input type="date" class="form-control" name="end_date"> 
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Length in minutes</label>
                        <input type="number" class="form-control" name="length"> 
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Release Year</label>
                        <input type="date" class="form-control" name="year"> 
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <input type="text" class="form-control" name="description"> 
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Type</label>
                        <select name="type" id="">
                            @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->type}}</option>
                            @endforeach
                        </select> 
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Rating</label>
                        <select name="rating" id="">
                            @foreach ($ratings as $rating) 
                            <option value="{{$rating->id}}">{{$rating->rating_type}}</option>
                            @endforeach
                        </select> 
                      </div>
                      <div class="form-check">
                        <label for=""><h4>Actors</h4></label><br>
                        @foreach ($actors as $actor)
                        <input class="form-check-input" type="checkbox" name="actors[]" value="{{$actor->id}}">
                        <label class="form-check-label" for="flexCheckChecked">
                            {{$actor->name}} {{$actor->surname}}
                        </label>
                        <br>
                        @endforeach
                      </div>
                      <div class="form-check">
                        <label for=""><h4>Directors</h4></label><br>
                        @foreach ($directors as $director)
                        <input class="form-check-input" type="checkbox" name="directors[]" value="{{$director->id}}">
                        <label class="form-check-label" for="flexCheckChecked">
                            {{$director->name}} {{$director->surname}}
                        </label>
                        <br>
                        @endforeach
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Image</label>
                        <input type="text" class="form-control" name="image"> 
                      </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
