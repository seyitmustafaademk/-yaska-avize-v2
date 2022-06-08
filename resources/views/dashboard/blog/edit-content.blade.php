@extends('dashboard._layout.general-layout')

@section('head-bottom')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('footer-bottom')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Enter content...',
            tabsize: 2,
            height: 300,
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12">
                <form action="{{ route('admin.blog.edit-content-post') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control" name="title" value="{{ $post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select id="category_id" class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <textarea name="summernote" id="summernote">{{ $post->content }}</textarea>
                    </div>
                    <div class="from-group">
                        <button type="submit" class="btn btn-lg btn-block btn-primary text-capitalize">update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection