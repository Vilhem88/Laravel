<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
    <div class="row">
        <div class="col-10">


            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Email</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($editors as $editor)
                    <tr>
                        <th scope="row">{{ $editor->id }}</th>
                        <td>{{$editor->name }}</td>
                        <td>{{$editor->role->name}}</td>
                        <td>{{$editor->email}}</td>
                        @if(Auth::user()->id == $editor->id)
                        <td>
                            <form action="{{ route('users.destroy', $editor->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm mt-2 btn-danger">Delete</button>
                            </form>
                        </td>
                        @endif
                      </tr>
                          
                    @endforeach
                  
                </tbody>
              </table>
            
        </div>
    </div>
   </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>