@extends('layouts.app')
@section('content')
    <h5 class=" text-center fw-bold">Update Classroom</h5>
    <form action="{{ route('classroom.update',$classroom->id) }}" method="POST" class=" form-control">
        @csrf
        @method('PATCH')
            <div class=" col-6">
                <label for="" class=" form-label mb-0">Class Room Name</label>
                <input type="text" value="{{ $classroom->name}}" class=" form-control @error('name')
                    is-invalid
                @enderror" name="name" placeholder="Enter New Class Room Name" class=" inline-block">
                @error('name')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class=" d-flex justify-content-start mt-3">
                <button type="submit" class=" btn btn-outline-primary">Update</button>
            </div>

    </form>
@endsection
