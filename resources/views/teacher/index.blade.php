@extends('layouts.app')
@section('content')
    <section>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Teacher Lists</li>
            </ol>
          </nav>
        <h3 class=" text-center fw-bold">Teacher Lists</h3>
        <div class="d-flex justify-content-between mb-3">
            <div class="">
                @if(request('keyword'))
                    <span class="mb-0">Search By : " {{ request('keyword') }} "</span>
                    <a href="{{ route('teacher.index') }}">
                        <i class="bi bi-trash3"></i>
                    </a>
                @endif
            </div>
            <form action="{{ route('teacher.index') }}" method="get">
                <div class="input-group">
                    <input type="text" placeholder="Search teacher's name" class="form-control" name="keyword" required>
                    <button class="btn btn-primary">
                        <i class="bi bi-search"></i>
                        Search
                    </button>
                </div>
            </form>
        </div>
        <div class=" mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col" w-25>Address</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Control</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr>

                            <th scope="row">{{ $teacher->id }}</th>
                            <td>
                                <div>
                                    <img src="{{ asset('storage/' . $teacher->photo) }}" alt="" class=" teacher-img">
                                </div>
                            </td>
                            <td>{{ $teacher->name }}</td>
                            <td>{{ $teacher->email }}</td>
                            <td>{{ $teacher->phone }}</td>
                            <td class=" w-25">{{ $teacher->address }}</td>
                            <td>
                                <p class="small mb-0 ">
                                    <i class="bi bi-calendar"></i>
                                    {{ $teacher->created_at->format('d M Y') }}
                                </p>
                                <p class="small mb-0 ">
                                    <i class="bi bi-clock"></i>
                                    {{ $teacher->created_at->format('h : m A') }}
                                </p>
                            </td>
                            <td>
                                <div class=" d-flex align-items-center m-2 gap-1">
                                    <form action="{{ route('teacher.destroy',$teacher->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class=" btn btn-danger btn-sm ">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('teacher.edit',$teacher->id) }}" method="get">
                                        @csrf
                                        <button class=" btn btn-primary btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>


                        </tr>
                    @empty
                        <h1 class=" text-center">There is no teacher lists.</h1>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class=" mt-auto">
            {{ $teachers->onEachSide(3)->links() }}
        </div>
    </section>
@endsection
