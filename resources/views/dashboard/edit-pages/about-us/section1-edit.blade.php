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
            fontNames: ['Arial', 'Arial Black'],
            addDefaultFonts: false
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.edit-page.about-us.edit-content-post') }}" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group-wrapper">
                        @csrf
                        <input type="hidden" name="id" value="{{ $new_content['id'] }}">
                        <div class="form-group">
                            <label for="top_title">Top Title</label>
                            <input required type="text" class="form-control" name="top_title" id="top_title" value="{{ $new_content['top_title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input required type="text" class="form-control" name="title" id="title" value="{{ $new_content['title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Description</label>
                            <textarea name="summernote" id="summernote">{!! $new_content['description'] !!}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection



