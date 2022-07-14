<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostShowController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('posts', 150, function(){
            return Post::all();
        });
       
        return view('welcome', compact('posts'));
    }
}
