    @extends('master')


    @section('content')

    @include('user.navbar')
    
    <div class="container">
        <div class="row">
            <div class="col-8">
               @include('sessions')
            </div>
        </div>
    </div>
    @endsection
