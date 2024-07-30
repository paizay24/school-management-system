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
       @admin
       <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('teacher.create') }}">
        <div class=" d-flex">
         <div class=" d-inline-block"><i class="bi bi-person-plus"></i>
             Add Teacher</div>

        </div>
     </a>
       @endadmin




    </div>

    <p class="small text-black-50 mb-1">Manage Classrooms</p>
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('classroom.index') }}">
            <i class="bi bi-hospital"></i>
            Classroom Lists
        </a>
        @admin
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('classroom.create') }}">
            <i class="bi bi-plus-lg"></i>
            Create New Classroom
        </a>
        @endadmin

    </div>

    <p class="small text-black-50 mb-1">Manage Students</p>
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('student.index') }}">
            <i class="bi bi-people"></i>
          Student Lists
        </a>
        @admin
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('student.create') }}">
            <i class="bi bi-person-plus"></i>
            Create New Student
        </a>
        @endadmin
    </div>
    <p class="small text-black-50 mb-1">Manage Announcements</p>
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('post.index') }}">
            <i class="bi bi-megaphone"></i>
          Announcements Lists
        </a>

        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('post.create') }}">
            <i class="bi bi-send-plus"></i>
            Create New Announcement
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
