<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all(); // Lấy tất cả các bài viết
        return view('home', compact('posts')); // Trả về view home.blade.php
    }
}
