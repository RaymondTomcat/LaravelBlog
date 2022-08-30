<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('category_id', null)->get();
        $category = Category::paginate();
        return view('panel.categories.index', compact('categories', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'unique:categories'],
            'category_id' => ['nullable', 'exists:categories,id']
        ]);

        Category::create(
            $request->only(['name', 'slug', 'category_id'])
        );

        $notification = array(
            'message' => 'دسته بندی مورد نظر با موفقیت ایجاد شد.',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('category_id', null)->get();
        return view('panel.categories.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['nullable', 'exists:categories,id']
        ]);

        Category::where('id', $id)
            ->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
            ]);

        $notification = array(
            'message' => 'دسته بندی مورد نظر با موفقیت به روز رسانی شد.',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();
        $notification = array(
            'message' => 'کاربر مورد نظر با موفقیت حذف شد.',
            'alert-type' => 'success'
        );

        return redirect()->route('categories.index')->with($notification);
    }
}
