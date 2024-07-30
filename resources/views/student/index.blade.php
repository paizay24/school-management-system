@extends('layouts.app')

@section('content')
    <section>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active" aria-current="page">Student Lists</li>
            </ol>
          </nav>
        <h5 class=" text-center fw-bold">Student Lists</h5>
        <div class="d-flex justify-content-between mb-3">
            <div class="">
                @if(request('keyword'))
                    <span class="mb-0">Search By : " {{ request('keyword') }} "</span>
                    <a href="{{ route('student.index') }}">
                        <i class="bi bi-trash3"></i>
                    </a>
                @endif
            </div>
            <form action="{{ route('student.index') }}" method="get">
                <div class="input-group">
                    <input type="text" placeholder="Searchby name,classroom,gender " class="form-control" name="keyword" required>
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
                    @forelse ($students as $student)
                        <tr>

                            <th scope="row">{{ $student->id }}</th>
                            <td>
                                <div>
                                    <img src="{{ asset('storage/' . $student->photo) }}" alt="" class=" student-img">
                                </div>
                            </td>
                            <td>{{ $student->name }}
                                <div>
                                    <span class="badge text-bg-primary">{{ $student->gender }}</span>
                                    <span class="badge text-bg-warning">Roll -{{  $student->roll_no }}</span>
                                    <span class="badge text-bg-success">{{ $student->classroom->name }}</span>
                                </div>
                            </td>

                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td class=" w-25">{{ $student->address }}</td>
                            <td>
                                <p class="small mb-0 ">
                                    <i class="bi bi-calendar"></i>
                                    {{ $student->created_at->format('d M Y') }}
                                </p>
                                <p class="small mb-0 ">
                                    <i class="bi bi-clock"></i>
                                    {{ $student->created_at->format('h : m A') }}
                                </p>
                            </td>
                            <td>
                                <div class=" d-flex align-items-center m-2 gap-1">
                                    <form action="{{ route('student.destroy',$student->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class=" btn btn-danger btn-sm ">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('student.edit',$student->id) }}" method="get">
                                        @csrf
                                        <button class=" btn btn-primary btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>


                        </tr>
                    @empty
                        <h1 class=" text-center">There is no student lists.</h1>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class=" mt-auto">
            {{ $students->onEachSide(3)->links() }}
        </div>
    </section>
@endsection
