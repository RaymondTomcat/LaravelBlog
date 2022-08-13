<x-panel-layout>
    <x-slot name="title">
        - کاربران
    </x-slot>
    <button type="button" class="btn btn-primary"><i class="fa-solid fa-plus"></i> کاربر جدید</button>
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
          <tr>
            <th scope="row">1</th>
            <td>تست</td>
            <td>تست</td>
            <td>تست</td>
            <td>تست</td>
            <td>تست</td>
            <td>تست</td>
            <td class="text-center">
                <div class="btn-group" role="group" aria-label="Basic mixed styles">
                    <button type="button" class="btn btn-secondary btn-sm"><i class="fa-solid fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                </div>
            </td>
          </tr>
        </tbody>
    </table>
</x-panel-layout>
