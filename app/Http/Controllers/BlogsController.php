<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use Session;

class BlogsController extends Controller
{
    public function __construct()
    {
        $this->middleware('author', ['only'=> ['create', 'store', 'edit', 'update']]);
        $this->middleware('admin', ['only'=>['delete', 'trash', 'restore', 'permanentDelete']]);
    }

    public function index()
    {
        $blogs=Blog::where('status', 1)->latest()->get();
        //$blogs=Blog::latest()->get();
        return view('blogs.index', compact('blogs'));
    }

    public function show($id)
    {
        $blog=Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    public function edit($id)
    {
        $categories=Category::latest()->get();
        $noChecksCategories=array();
        foreach ($categories as $category) {
            $noChecksCategories[]=$category->id;
        }
        $filtered=array_except($categories, $noChecksCategories);
        $blog=Blog::findOrFail($id);
        return view('blogs.edit', ['blog'=>$blog, 'categories'=>$categories, 'filtre'=>$filtered]);
    }

    public function update(Request $request, $id)
    {
        $blog=Blog::findOrFail($id);
        $input=$request->all();
        $blog->update($input);
        // sync categories to blog
        if ($request->category_id) {
            $blog->category()->sync($request->category_id);
        }
        return redirect('/blogs'); 
    }

    public function create()
    {
        $categories = Category::latest()->get();
        return view('blogs.create', compact('categories'));
    }

    public function delete(Request $request, $id)
    {
        $blog=Blog::findOrFail($id);
        $blog->delete();

        return redirect('/blogs');
    }

    public function trash()
    {
        $strahedBlogs = Blog::onlyTrashed()->get();
        return view('blogs.trash', compact('strahedBlogs'));
    }

    public function restore($id)
    {
        $restoreBlog=Blog::onlyTrashed()->findOrFail($id);
        $restoreBlog->restore();

        return redirect ('blogs');
    }

    public function trashDelete($id)
    {
        $blogTrashDelete=Blog::onlyTrashed()->findOrFail($id);
        $blogTrashDelete->forceDelete($blogTrashDelete);

        return back();
    }

    public function store(Request $request)
    {
        // validate
        $rules= [
            'title'=>['required', 'min:20', 'max:160'],
            'body'=> ['required', 'min:20', 'max:282']
        ];

        $this->validate($request, $rules);
        $input=$request->all();
        // meta
        $input['slug']=str_slug($request->title);
        $input['meta_title']=str_limit($request->title, 55);
        $input['meta_description']=str_limit($request->body, 155);
        // image upload
        if ($file=$request->file('featured_image')) {
            $imageName=uniqid().$file->getClientOriginalName();
            $file->move('images/featured_image/',$imageName);
            $input['featured_image']=$imageName;
        }
        $blogByUser = $request->user()->blogs()->create($input);

        if ($request->category_id) {
            $blogByUser->category()->sync($request->category_id);
        }

        Session::flash('blog_created_message', 'Féliciation.');
        return redirect('/blogs');
    }
}
