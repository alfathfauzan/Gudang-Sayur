<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs',[ 
            "blogs" => Blog::all()
        ]);
    }
    public function show(Blog $blog)
    {
        return view('blogPost',[
            "judul_blog" => "Post Pertama",
            
            "blog" => $blog
        ]);
    }

    public function countBlogs()
    {
        $count = Blog::count();
        return $count;
    }

    public function create()
    {
        return view('blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_blog' => 'required|string|max:255',
            'blog_image' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);
    
        Blog::create($request->all());
    
        return redirect()->route('blogs')->with('success', 'Blog added successfully');
    }

    public function shows($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blog.show', compact('blog'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $blog->update($request->all());

        return redirect()->route('blogs')->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        $blog->delete();

        return redirect()->route('blogs')->with('success', 'Blog deleted successfully');
    }
}
