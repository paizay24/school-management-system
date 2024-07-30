@extends('master')
@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <h1 class="text-center mb-4">Announcement Page</h1>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        @if (request('keyword'))
                            <span class="me-2">
                                Search By: "{{ request('keyword') }}"
                            </span>
                            <a href="{{ route('page.index') }}" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash3"></i> Clear
                            </a>
                        @endif
                    </div>
                    <form action="{{ route('page.index') }}" method="get" class="d-flex">
                        <input type="text" name="keyword" required class="form-control me-2" placeholder="Search..." aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>

                @forelse ($posts as $post)
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <p class="text-muted">{{ $post->created_at->diffForHumans() }}</p>
                            <a href="{{ route('page.detail', $post->slug) }}" class="btn btn-primary">See more</a>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-warning text-center" role="alert">
                        There is no post.
                    </div>
                @endforelse

                <div class="d-flex justify-content-center mt-4">
                    {{ $posts->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
