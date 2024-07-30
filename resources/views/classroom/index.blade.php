@extends('layouts.app')
@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Class Room Lists</li>
    </ol>
  </nav>
    <h5 class=" text-center fw-bold">Class Room Lists</h5>
    <div class=" mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Class Name</th>
                    <th scope="col">Total Students</th>
                    <th scope="col">Created_at</th>
                    @admin
                    <th scope="col">Control</th>
                    @endadmin
                </tr>
            </thead>
            <tbody>
                @forelse ($classRooms as $classRoom)
                    <tr>

                        <th scope="row">{{ $classRoom->id }}</th>
                        <td>{{ $classRoom->name }}</td>
                       <td> {{ $classRoom->students->count() }}</td>
                        <td>
                        <p class="small mb-0 ">
                            <i class="bi bi-calendar"></i>
                            {{ $classRoom->created_at->format('d M Y') }}
                        </p>
                        <p class="small mb-0 ">
                            <i class="bi bi-clock"></i>
                            {{ $classRoom->created_at->format('h : m A') }}
                        </p>
                        </td>
                        @admin
                        <td>
                            <div class=" d-flex align-items-center m-2 gap-1">
                                <form action="{{ route('classroom.destroy', $classRoom->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class=" btn btn-danger btn-sm ">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                                <form action="{{ route('classroom.edit', $classRoom->id) }}" method="get">
                                    @csrf
                                    <button class=" btn btn-primary btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endadmin


                    </tr>
                @empty
                    <h1 class=" text-center">There is no classroom lists.</h1>
                @endforelse

            </tbody>
        </table>
    </div>
@endsection
