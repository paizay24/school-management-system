@extends('layouts.app')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Announcement Lists</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create Announcement</li>
        </ol>
    </nav>
    <main>
        <main>
            <div class=" card">
                <div class=" card-body">
                    <h4>Create Post</h4>

                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label mb-0">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                placeholder="Enter Announcement Title"
                                class="form-control form-control-sm @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label mb-0">Announcement Description</label>
                            <textarea name="description" class=" form-control @error('description') is-invalid @enderror" id=""
                                cols="30" rows="5">
                            {{ old('description') }}
                        </textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">

                            <label for="" class="form-label mb-0">Choose Announcement Photos</label>
                            <input type="file" name="photos[]"
                                class=" form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror"
                                multiple>
                            @error('photos')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            @error('photos.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </main>
    </main>
@endsection
