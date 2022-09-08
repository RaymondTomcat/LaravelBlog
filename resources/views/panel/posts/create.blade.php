<x-panel-layout>
    <x-slot name="title">
        - ارسال نوشته
    </x-slot>
    <div class="col-md-8 offset-2">
        <div class="card">
            <div class="card-body">
                <form class="row g-3" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">عنوان فارسی</label>
                        <input type="text" class="form-control" name="title" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">عنوان انگلیسی</label>
                        <input type="text" class="form-control" name="slug" id="inputPassword4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">انتخاب دسته بندی</label>
                        <select id="inputState" class="form-select" name="category_id">
                            <option selected>انتخاب کنید ...</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">آپلود عکس</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">متن</label>
                            <textarea class="form-control" id="editor" rows="3" name="description"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> ارسال نوشته</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                language: {
                    // The UI will be English.
                    ui: 'en',

                    // But the content will be edited in Arabic.
                    content: 'ar'
                }
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
</x-panel-layout>
