@extends('layouts.app')
@section('content')
    <section>
        <h5 class=" text-center fw-bold">Teacher Add Page</h5>
        <form action="{{ route('teacher.store') }}" method="POST" class=" form-control" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class=" col-6">
                    <label class=" form-label mb-0">Name</label>
                    <input type="text" name="name"
                    value="{{ old('name') }}"
                        class=" form-control @error('name')
                        is-invalid

                    @enderror"
                        placeholder=" Enter Teacher's name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-6">
                    <label class=" form-label mb-0">Email</label>
                    <input type="email" name="email"
                     value="{{ old('email') }}"
                        class=" form-control @error('email')
                        is-invalid
                    @enderror"
                        placeholder=" Enter Teacher's email">
                </div>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <hr>
            <div class="row mt-3">
                <div class=" col-6">
                    <label class=" form-label mb-0">Phone Number</label>
                    <input type="number" name="phone"
                     value="{{ old('phone') }}"
                        class=" form-control @error('phone')
                        is-invalid
                    @enderror "
                        placeholder=" Enter Teacher's phone number">
                    @error('phone')
                        <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-6">
                    <label class=" form-label mb-0">Address</label>
                    <input type="text" name="address"
                     value="{{ old('address') }}"
                        class=" form-control @error('address')
                        is-invalid
                    @enderror"
                        placeholder=" Enter Teacher's address">
                    @error('phone')
                        <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <div class=" my-3">
                <label for="" class=" form-label mb-0">Choose Image</label>
                <input type="file"
                    class=" form-control @error('teacher_img')
                    is-invalid
                @enderror"
                    name=" teacher_img">
                @error('teacher_img')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class=" d-flex justify-content-end">
                <button class=" btn btn-outline-primary ">Add Teacher</button>
            </div>
        </form>
    </section>
@endsection
