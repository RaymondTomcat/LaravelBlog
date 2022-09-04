<x-panel-layout>
    <x-slot name="title">
        - ویرایش
    </x-slot>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">شناسه</th>
                    <th scope="col">نام فارسی دسته بندی</th>
                    <th scope="col">نام انگلیسی دسته بندی</th>
                    <th scope="col">دسته بندی پدر</th>
                    <th scope="col">عملیات</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('categories.update', $category->id)}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="Input1" class="form-label">عنوان دسته بندی (فارسی)</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" id="Input1">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Input2" class="form-label">عنوان دسته بندی (انگلیسی)</label>
                            <input type="text" disabled name="slug" class="form-control" value="{{ $category->slug }}" id="Input2">

                        </div>
                        <div class="mb-3">
                            <label for="Input3" class="form-label">دسته پدر</label>
                            <select class="form-select" name="category_id" id="Input3">
                                <option selected disabled>انتخاب کنید ...</option>
                                @foreach($categories as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> به روز رسانی دسته بندی</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-panel-layout>
