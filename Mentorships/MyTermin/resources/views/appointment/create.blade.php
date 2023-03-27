@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10">
                <a class="btn btn-primary " href="{{ route('titlePage') }}">Home</a>
                <form class="w-50 m-auto" action="{{ route('home.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Date/Time</label>
                        <input type="datetime-local" name="appointment_date"
                            class="form-control @error('appointment_date')is-invalid @enderror"
                            value="{{ old('appointment_date') }}">
                        @error('appointment_date')
                            <div class="invalid-feedback">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="">Choose a Doctor</label>
                        <select class="form-control text-center" name="doctor_id" id="">
                            <option value="">----- Select ------</option>
                            @foreach ($doctors as $doctor)
                                <option value="{{ $doctor->id }}">{{ $doctor->name . '-' . $doctor->specialisation }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
