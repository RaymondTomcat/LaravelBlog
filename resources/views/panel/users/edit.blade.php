<x-panel-layout>
    <div class="col-md-5 offset-md-3">
        <div class="card">
            <div class="card-body">
                <form action="{{route('users.update', $user->id)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="Input1" class="form-label">نام و نام خانوادگی</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="Input1">
                        @error('name')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="Input2" class="form-label">ایمیل</label>
                        <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="Input2">
                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <select class="form-select mb-3" name="role" aria-label="Default select">
                        <option selected>انتخاب کنید ...</option>
                        <option value="admin" @if($user->role === 'admin') selected @endif>مدیر</option>
                        <option value="author" @if($user->role === 'author') selected @endif>نویسنده</option>
                        <option value="user" @if($user->role === 'user') selected @endif>عادی</option>
                        @error('role')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </select>
                    <button class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> به روز رسانی کاربر</button>
                </form>
            </div>
        </div>
    </div>
</x-panel-layout>
