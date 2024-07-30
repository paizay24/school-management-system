<div class=" position-sticky ">
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('home') }}">
            <i class="bi bi-speedometer"></i>
            Admin Dashboard
        </a>

    </div>


    <p class="small text-black-50 mb-1">Manage Teachers</p>
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('teacher.index') }}">
            <i class="bi bi-people"></i>
            Teacher Lists
        </a>
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('teacher.create') }}">
            <i class="bi bi-person-plus"></i>
            Add Teacher
        </a>




    </div>

    <p class="small text-black-50 mb-1">Manage Classrooms</p>
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('classroom.index') }}">
            <i class="bi bi-hospital"></i>
            Classroom Lists
        </a>

        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('classroom.create') }}">
            <i class="bi bi-plus-lg"></i>
            Create New Classroom
        </a>
    </div>

    <p class="small text-black-50 mb-1">Manage Students</p>
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('student.index') }}">
            <i class="bi bi-people"></i>
          Student Lists
        </a>

        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('student.create') }}">
            <i class="bi bi-person-plus"></i>
            Create New Student
        </a>
    </div>
</div>

{{-- @admin
<p class="small text-black-50 mb-1">Manage User</p>
<div class="list-group mb-3">
    <a class="list-group-item list-group-item-action" href="{{ route('user.index') }}">
       User List
    </a>


</div>
@endadmin --}}
