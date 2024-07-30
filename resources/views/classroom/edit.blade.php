@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page" ><a href="{{ route('classroom.index') }}">Class Room Lists</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update Classroom</li>

    </ol>
  </nav>
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
