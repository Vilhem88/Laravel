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
    <div class="container-fluid bg-warning bg-gradient mt-5 text-center">
        <div class="row mr-auto">
            <div class="coll offset text-center" style=" padding: 30px;">
               
                    <div class="card" style="width: 18rem;">
                        <h5 class="card-title card-body text-center">{{ $pokemon['title'] }}</h5>
                        <img src="{{ $pokemon['image'] }}" class="card-img-top" alt="">
                        <h5 class="card-title card-body text-center">{{ $pokemon['desc'] }}</h5>
                    </div>
               
                    <a href="{{URL::to('/')}}">Home</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
