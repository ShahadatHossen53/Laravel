<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Intervention\Image\Image;
use Spatie\Backtrace\File;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $subcategory = Subcategory::all();

        return view('admin.post.create', compact(['category', 'subcategory']));
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
            'post_title' => 'required',
            'description' => 'required'
        ]);
        $category_id = Subcategory::where('id', $request->subcategory_id)->first()->category_id;

        $slug = Str::slug($request->post_title, '-');

        $post = new Post();
        $post->category_id = $category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->user_id = Auth::id();
        $post->title = $request->post_title;
        $post->post_slug = $slug;
        $post->post_date = $request->post_date;
        $post->tags = $request->tags;
        $post->description = $request->description;
        $post->status = 0;
        $photo = $request->image;
        if ($photo) {
            $photoname = $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600, 400)->save('public/media/'.$photoname);
            $post->image = 'public/media/'.$photoname;
        }
        
        $post->save();
        $notification = array('message'=>'Your post added a successfuly!', 'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.post.edit', compact(['post', 'category', 'subcategory']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required',
            'description' => 'required'
        ]);
        $category_id = Subcategory::where('id', $request->subcategory_id)->first()->category_id;

        $slug = Str::slug($request->post_title, '-');

        $post = Post::find($id);
        $post->category_id = $category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->user_id = Auth::id();
        $post->title = $request->post_title;
        $post->post_slug = $slug;
        $post->post_date = $request->post_date;
        $post->tags = $request->tags;
        $post->description = $request->description;
        $post->status = 0;
        $photo = $request->image;
        if ($photo) {
            $photoname = $slug.'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(600, 400)->save('public/media/'.$photoname);
            $post->image = 'public/media/'.$photoname;
        }
        
        $post->update();
        $notification = array('message'=>'Your post updated successfuly!', 'alert-type'=>'success');
        return redirect()->route('posts.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        $notification = array('message'=>'Post Deleted!', 'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }
}
