@extends('layouts.app')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Announcement Lists</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Announcement</li>
        </ol>
    </nav>
    <main>
        <main>
            <h3 class=" text-center fw-bold">Update Announcement</h3>
            <div class=" card">
                <div class=" card-body">


                    <form action="{{ route('post.update', $post->id) }}" method="POST" id="updateForm"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    </form>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" form="updateForm"
                            value="{{ old('title', $post->title) }}" placeholder="Enter Announcement Title"
                            class="form-control form-control-sm @error('title') is-invalid @enderror">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Announcement Description</label>
                        <textarea name="description" form="updateForm" class=" form-control @error('description') is-invalid @enderror"
                            id="" cols="30" rows="5">
                            {{ old('description', $post->description) }}
                        </textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <div class="mb-2 d-flex">
                            @foreach ($post->photos as $photo)
                                <div class=" position-relative me-2">
                                    <img src="{{ asset('storage/' . $photo->name) }}" height="100" class="rounded"
                                        alt="">
                                    <form action="{{ route('photos.destroy', $photo->id) }}" class="d-inline-block "
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-sm btn-danger position-absolute bottom-0 end-0">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                        <div class="">
                            <label class="form-label" for="photos">Announcement Photo</label>
                            <input type="file"
                                class="form-control @error('photos') is-invalid @enderror @error('photos.*') is-invalid @enderror"
                                name="photos[]" id="photos" multiple form="updateForm">
                            @error('photos')
                            <div class="invalid-feedback">{{ $message }}</div>

                            @enderror
                            @error('photos.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>



                    <button type="submit" form="updateForm" class="btn btn-primary">Update</button>


                </div>
            </div>

        </main>
    </main>
@endsection
