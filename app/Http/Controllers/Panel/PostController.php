<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(10);
        return view('panel.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('panel.posts.create', compact('categories'));
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
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048'],
            'description' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);

        $imageName = time().'.'.$request->image->extension();

        Post::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/images'), $filename);
            $data['image']= $filename;
        }

        $notification = array(
            'message' => 'نوشته مورد نظر با موفقیت ثبت شد.',
            'alert-type' => 'success'
        );

        return redirect()->route('posts.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('panel.posts.edit', compact('categories', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'category_id' => ['required', 'exists:categories,id']
        ]);

        Post::where('id', $id)
            ->update([
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
                'category_id' => $request->category_id
            ]);

        $notification = array(
            'message' => 'نوشته مورد نظر با موفقیت به روز رسانی شد.',
            'alert-type' => 'success'
        );

        return redirect()->route('posts.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
