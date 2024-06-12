@extends('partials.app')

@section('body')
    <h1 class="mb-0">Edit Blog</h1>
    <hr />
    <form action="{{ route('blog.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Blog Name</label>
                <input type="text" name="judul_blog" class="form-control" placeholder="Blog Name" value="{{ $blog->judul_blog }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Blog Image</label>
                <input type="text" name="blog_image" class="form-control" placeholder="Blog Image" value="{{ $blog->blog_image }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ $blog->slug }}" >
            </div>    
            <div class="col mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $blog->author }}" >
            </div> 
            <div class="col mb-3">
                <label class="form-label">Isi</label>
                <input type="text" name="isi" class="form-control" placeholder="Isi" value="{{ $blog->isi }}" >
            </div> 
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection