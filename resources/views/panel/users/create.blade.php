<x-panel-layout>
    <div class="col-md-5 offset-md-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="Input1" class="form-label">نام و نام خانوادگی</label>
                        <input type="text" name="name" class="form-control" id="Input1">
                        @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Input2" class="form-label">ایمیل</label>
                        <input type="text" name="email" class="form-control" id="Input2">
                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- <div class="mb-3">
                        <label for="Input3" class="form-label">رمز عبور</label>
                        <input type="text" name="password" class="form-control" id="Input3">
                        @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> -->
                    <select class="form-select mb-3" name="role" aria-label="Default select">
                        <option selected>انتخاب کنید ...</option>
                        <option value="admin">مدیر</option>
                        <option value="author">نویسنده</option>
                        <option value="user">عادی</option>
                        @error('role')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </select>
                    <button class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> ایجاد کاربر</button>
                </form>
            </div>
        </div>
    </div>
</x-panel-layout>
