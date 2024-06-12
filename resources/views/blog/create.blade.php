@extends('partials.app')

@section('body')
    <h1 class="mb-0">Add Blog</h1>
    <hr />
    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="judul_blog" class="form-control" placeholder="Blog Name">
            </div>
            <div class="col">
                <input type="text" name="blog_image" class="form-control" placeholder="Blog Image">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="slug" class="form-control" placeholder="Slug">
            </div>
            
            <div class="col">
                <input type="text" name="author" class="form-control" placeholder="Author">
            </div>
            <div class="col">
                <input type="text" name="isi" class="form-control" placeholder="Isi">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection