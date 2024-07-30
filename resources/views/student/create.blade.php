@extends('layouts.app')
@section('content')
    <section>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page" ><a href="{{ route('student.index') }}">Student Lists</a></li>
              <li class="breadcrumb-item active" aria-current="page">Add Student</li>

            </ol>
          </nav>
        <h5 class=" text-center fw-bold">Student Add Page</h5>
        <form action="{{ route('student.store') }}" method="POST" class=" form-control" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class=" col-6">
                    <label class=" form-label mb-0">Name</label>
                    <input type="text" name="name"
                    value="{{ old('name') }}"
                        class=" form-control @error('name')
                        is-invalid

                    @enderror"
                        placeholder=" Enter Student's name">
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
                        placeholder=" Enter Student's email">
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
                        placeholder=" Enter Student's phone number">
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
                        placeholder=" Enter Student's address">
                    @error('phone')
                        <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <div class="row mt-3">
                <div class=" col-4">
                    <label class=" form-label mb-0">Roll No</label>
                    <input type="number" name="roll_no"
                     value="{{ old('roll_no') }}"
                        class=" form-control @error('roll_no')
                        is-invalid
                    @enderror "
                        placeholder=" Enter Student's roll number">
                    @error('roll_no')
                        <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-4">
                    <label class=" form-label mb-0">Choose Classroom</label>
                    <select  name="classroom_id" class=" form-select @error('classroom')
                        is-invalid
                    @enderror">
                    @foreach (\App\Models\Classroom::all() as $classroom )
                            <option value="{{ $classroom->id }}"  {{ $classroom->id == old('classroom') ? 'selected' : '' }}>{{ $classroom->name }}</option>
                    @endforeach
                    </select>
                    @error('classroom_id')
                        <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class=" col-4">
                    <label for="" class=" form-label mb-0">Choose Gender</label>
                    <select name="gender" class=" form-select" type="date" id="">
                        <option value="male" selected>Male</option>
                        <option value="female" >Female</option>

                    </select>
                    @error('gender')
                        <div class=" invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <hr>
            <div class=" my-3">
                <label for="" class=" form-label mb-0">Choose Image</label>
                <input type="file"
                    class=" form-control @error('student_img')
                    is-invalid
                @enderror"
                    name=" student_img">
                @error('student_img')
                    <div class=" invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class=" d-flex justify-content-end">
                <button class=" btn btn-outline-primary ">Add Student</button>
            </div>
        </form>
    </section>
@endsection
