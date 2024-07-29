@extends('layouts.app')
@section('content')
    <h5 class=" text-center fw-bold">Create new Classroom </h5>
    <form action="{{ route('classroom.store') }}" method="POST" class=" form-control">
        @csrf
            <div class=" col-6">
                <label for="" class=" form-label mb-0">Class Room Name</label>
                <input type="text" class=" form-control @error('name')
                    is-invalid
                @enderror" name="name" placeholder="Enter New Class Room Name" class=" inline-block">
                @error('name')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class=" d-flex justify-content-start mt-3">
                <button type="submit" class=" btn btn-outline-primary">Add</button>
            </div>

    </form>
@endsection
