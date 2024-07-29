<div class=" position-sticky ">
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action cursor-pointer" href="{{ route('home') }}">
            <i class="bi bi-speedometer"></i>
            Admin Dashboard
        </a>

    </div>


    <p class="small text-black-50 mb-1">Manage Teacher</p>
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

    <p class="small text-black-50 mb-1">Manage Category</p>
    <div class="list-group mb-3">
        <a class="list-group-item list-group-item-action">
            Category List
        </a>

        <a class="list-group-item list-group-item-action">
            Create Category
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
