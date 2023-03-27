<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>
    
    {{-- styles --}}
    @include('layouts.styles')
</head>

<body class="text-center">

  {{-- navbar --}}
    @include('layouts.navbar')

    {{-- content --}}
    @yield('content')


    {{-- scripts --}}
    @include('layouts.script')
</body>

</html>
