@extends('layouts.app')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Announcement Lists</a></li>
            <li class="breadcrumb-item active" aria-current="page">Announcement Detail</li>
        </ol>
    </nav>
    <main>
        <h4 class="my-4">Announcement Detail</h4>
        <div class="card shadow-sm p-4 mb-5 bg-white rounded">
            <div class="card-title">
                <h5 class="fw-bold">{{ $post->title }}</h5>
                <div class="d-flex gap-3 mt-2">
                    <span class="badge bg-secondary">{{ $post->created_at->format('d F Y') }}</span>
                    <span class="badge bg-secondary">{{ $post->created_at->format('h:i A') }}</span>
                </div>
            </div>
            <hr>
            <div class="card-body">
                <p>{{ $post->description }}</p>
            </div>
            <hr>
            <div>
                <h5 class="mb-3">Announcement Photos</h5>
                <div class="card">
                    <div class="card-body">
                        <div class="gallery">
                            @forelse($post->photos as $photo)
                                <img src="{{ asset('storage/'.$photo->name) }}" class="w-100 mb-3 rounded" alt="">
                            @empty
                                <h3 class=" fw-bolder ">There is no photo yet</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
