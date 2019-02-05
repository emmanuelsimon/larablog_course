<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','admin'], ['only'=>['blogs']]);
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.index');
    }

    public function blogs() {
        $blogsPublish=Blog::where('status', 1)->latest()->get();
        $blogsDraft=Blog::where('status', 0)->latest()->get();
        return view('admin.blogs', compact('blogsPublish', 'blogsDraft'));
    }
}
