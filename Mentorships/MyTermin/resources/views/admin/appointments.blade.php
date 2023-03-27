@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="col-6 m-auto">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                </div>
                <a class="btn btn-primary " href="{{ route('home.index') }}">Home</a>
                <table class="table border mt-5  table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pacient Name</th>
                            <th scope="col">Doctor Name</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Approve</th>
                            <th scope="col">Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <th scope="row">{{ $appointment->id }}</th>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->doctor->name }}, {{ $appointment->doctor->specialisation }}</td>
                                <td>{{ $appointment->appointment_date }}</td>
                                <td>{{ $appointment->status }}</td>
                                <td>
                                    @if ($appointment->status == 'In progress' || $appointment->status == 'canceled')
                                        <a class="text-success btn"
                                            href="{{ route('admin.edit', $appointment->id) }}">Approve</a>
                                    @else
                                        <span class="text-primary">Approved</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($appointment->status == 'In progress' || $appointment->status == 'approved')
                                        <a class="text-danger btn"
                                            href="{{ route('admin.cancel', $appointment->id) }}">Cancel</a>
                                    @else
                                        <span class="text-danger">Canceled</span>
                                    @endif
                                </td>
                                {{-- <td>
                                    <form action="{{ route('admin.destroy', $appointment->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-link text-danger text-decoration-none">cancel</button>
                                    </form>
                                </td> --}}

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
