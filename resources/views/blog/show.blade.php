@extends('partials.app')

@section('body')
    <h1 class="mb-0">Detail Blog</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Blog Name</label>
            <input type="text" name="judul_blog" class="form-control" placeholder="Blog Name" value="{{ $blog->judul_blog }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Blog Image</label>
            <input type="text" name="blog_image" class="form-control " placeholder="Blog Image" value="{{ $blog->blog_image }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ $blog->slug }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $blog->author }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Isi</label>
            <input type="text" name="isi" class="form-control" placeholder="Isi" value="{{ $blog->isi }}" readonly>
        </div>
        
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $blog->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $blog->updated_at }}" readonly>
        </div>
    </div>
@endsection