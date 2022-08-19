<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">میزکار</div>
    <div class="list-group list-group-flush">
        <div class="text-center">
            <img src="{{ asset('img/1.png') }}" style="height: 100px; width: 100px;">
        </div>
        <div class="text-center mt-3">
            کاربر : {{ auth()->user()->name }}
        <br>
        نوع کاربر : {{ auth()->user()->getRolePersian() }}
        </div>

        <ul class="mt-5">
            <li class="fs-5 mb-3"><i class="fa-solid fa-user"></i> <a href="{{ route('users.index') }}">کاربران</a></li>
            <li class="fs-5 mb-3"><i class="fa-solid fa-folder"></i> <a href="#">دسته بندی</a></li>
        </ul>
    </div>
</div>
<!-- /#sidebar-wrapper -->


