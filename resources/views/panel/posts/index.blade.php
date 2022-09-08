<x-panel-layout>
    <x-slot name="title">
        - نوشته ها
    </x-slot>
    <a href="{{ route('posts.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> نوشته جدید</a>
    <table class="table mt-3 table-bordered">
        <thead>
        <tr>
            <th scope="col">شناسه</th>
            <th scope="col">عنوان</th>
            <th scope="col">دسته بندی</th>
            <th scope="col">عکس</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $row)
            <tr>
                <th scope="row">{{ $row->id }}</th>
                <th>{{ $row->title }}</th>
                <th>{{ $row->getParentName() }}</th>
                <th><img src="{{ url('public/images/'.$row->image) }}" style="height: 100px; width: 150px;"></th>
                <td>
                    <div class="text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('posts.edit', $row->id) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-edit"></i></a>
                            <a href="" class="btn btn-success btn-sm"><i class="fa-solid fa-eye"></i></a>
                            <form method="post" action="{{route('posts.destroy',$row->id)}}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-panel-layout>
