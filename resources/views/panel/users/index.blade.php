<x-panel-layout>
    <x-slot name="title">
        - کاربران
    </x-slot>
    <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> کاربر جدید</a>
    <table class="table mt-3 table-bordered">
        <thead>
          <tr>
            <th scope="col">شناسه</th>
            <th scope="col">نام کاربر</th>
            <th scope="col">ایمیل</th>
            <th scope="col">وضعیت ایمیل</th>
            <th scope="col">نوع کاربر</th>
            <th scope="col">وضعیت کاربر</th>
            <th scope="col">تاریخ عضویت</th>
            <th scope="col">عملیات</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $row)
            <tr>
                <th scope="row">{{$row->id}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td><span class="badge bg-danger">تایید نشده</span></td>
                <td>{{$row->getRolePersian()}}</td>
                <td>
                    @if(Cache::has('user-is-online-' . $row->id))
                        <span class="text-success"><i class="fa-solid fa-circle"></i> آنلاین</span>
                    @else
                        <span class="text-secondary"><i class="fa-solid fa-circle"></i> آفلاین</span>
                    @endif
                </td>
                <td>{{$row->getCreatedInJalali()}}</td>
                <td class="text-center">
                    <div class="btn-group" role="group" aria-label="Basic mixed styles">
                        <button type="button" class="btn btn-secondary btn-sm"><i class="fa-solid fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </td>
            </tr>
            
          @endforeach
        </tbody>
    </table>
</x-panel-layout>
