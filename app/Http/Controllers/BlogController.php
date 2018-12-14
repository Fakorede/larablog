<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller {

    protected $limit = 5;

    public function index() {

        // $posts = Post::all();
        // return view("blog.index", compact('posts'));

        $posts = Post::with('author')->latestFirst()->simplePaginate($this-limit);
        return view("blog.index", compact('posts'));
 
    }
}
