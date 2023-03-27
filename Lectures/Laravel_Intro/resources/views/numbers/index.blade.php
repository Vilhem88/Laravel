<!DOCTYPE html>
<html>

<head>

    <title>Numbers</title>
</head>

<body>
    

    <ul class="list-group">

            @for($i = 1; $i <= 10; $i++)
            @if($i % 2 == 0)
            <li class="list-group-item active">{{$i}} e paren broj</li>
            @else
            <li class="list-group-item active">{{$i}} e neparen broj</li>
            @endif
            @endfor

    </ul>


</body>

</html>