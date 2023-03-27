    @extends('master')

    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-8 mt-5">
                <table class="table border mt-5">
                    <a class="btn btn-primary " href="{{route('home.index')}}">Home</a>
                    @include('sessions')
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <th scope="row">{{ $appointment->id }}</th>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->doctor->name }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>{{ $appointment->appointment_date}}</td>
                                <td><a href="">edit</a> <br>
                                    <form action="{{route('home.delete', $appointment->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-link" onclick="return confirm('Are you sure you want to cancel your appointment?')">cancel   </button>
                                    </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endsection