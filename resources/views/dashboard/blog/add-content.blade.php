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
                <h1>Text</h1>
                <form action="{{ route('admin.blog.add-content') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label for="category_id">Title</label>
                        <select id="category_id" class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="summernote">Description</label>
                        <textarea name="summernote" id="summernote"></textarea>
                    </div>
                    <div class="from-group">
                        <button type="submit" class="btn btn-lg btn-block btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection