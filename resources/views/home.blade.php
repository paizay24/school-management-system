@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-items-center min-vh-100">
        <div class="col-12 text-center mb-2">
            <h3 class="display-3 fw-bold text-dark">Welcome Back to the Admin Dashboard</h3>
            <p class="lead text-muted">Here's an overview of your current stats</p>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 rounded-4 overflow-hidden shadow-lg" style="background: #00bcd4;">
                <div class="card-body text-center p-3">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <i class="bi bi-people-fill display-4" style="color: #ffffff;"></i>
                    </div>
                    <h5 class="card-title mb-2 text-white" style="font-size: 1.25rem;">Students</h5>
                    <p class="card-text fs-4 fw-bold text-white">{{ $students->count() }}</p>
                </div>
                <div class="card-footer border-0 bg-transparent text-center">
                    <a href=" {{ route('student.index') }}" class="btn btn-outline-light btn-sm">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 rounded-4 overflow-hidden shadow-lg" style="background: #673ab7;">
                <div class="card-body text-center p-3">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <i class="bi bi-person-badge-fill display-4" style="color: #ffffff;"></i>
                    </div>
                    <h5 class="card-title mb-2 text-white" style="font-size: 1.25rem;">Teachers</h5>
                    <p class="card-text fs-4 fw-bold text-white">{{ $teachers->count() }}</p>
                </div>
                <div class="card-footer border-0 bg-transparent text-center">
                    <a href="{{ route('teacher.index') }}" class="btn btn-outline-light btn-sm">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 rounded-4 overflow-hidden shadow-lg" style="background: #f44336;">
                <div class="card-body text-center p-3">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <i class="bi bi-journal-text display-4" style="color: #ffffff;"></i>
                    </div>
                    <h5 class="card-title mb-2 text-white" style="font-size: 1.25rem;">Posts</h5>
                    <p class="card-text fs-4 fw-bold text-white">{{ $posts->count() }}</p>
                </div>
                <div class="card-footer border-0 bg-transparent text-center">
                    <a href="{{ route('post.index') }}" class="btn btn-outline-light btn-sm">View Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card border-0 rounded-4 overflow-hidden shadow-lg" style="background: #ffeb3b;">
                <div class="card-body text-center p-3">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <i class="bi bi-door-open-fill display-4" style="color: #ffffff;"></i>
                    </div>
                    <h5 class="card-title mb-2 text-dark" style="font-size: 1.25rem;">Classrooms</h5>
                    <p class="card-text fs-4 fw-bold text-dark">{{ $classRooms->count() }}</p>
                </div>
                <div class="card-footer border-0 bg-transparent text-center">
                    <a href="{{ route('classroom.index') }}" class="btn btn-outline-dark btn-sm">View Details</a>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script>
    function updateCounts() {
        fetch('{{ route('dashboard.counts') }}')
            .then(response => response.json())
            .then(data => {
                document.getElementById('students-count').textContent = data.students;
                document.getElementById('teachers-count').textContent = data.teachers;
                document.getElementById('posts-count').textContent = data.posts;
                document.getElementById('classrooms-count').textContent = data.classrooms;
            })
            .catch(error => console.error('Error fetching counts:', error));
    }

    // Update counts every 30 seconds
    setInterval(updateCounts, 30000);

    // Initial fetch
    updateCounts();
</script>
@endsection
@endsection
