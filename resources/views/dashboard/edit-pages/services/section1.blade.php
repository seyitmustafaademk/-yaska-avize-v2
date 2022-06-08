@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('edit-pages.services.section1') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="img_name" value="{{ $content['video']['url'] ?? null }}">
                <div class="card-body">
                    <div class="form-group">
                        <label for="top_title">Top Title</label>
                        <input type="text" class="form-control" name="top_title" id="top_title" value="{{ $content['top_title'] ?? null }}">
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ $content['title'] ?? null }}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description">{{ $content['description'] ?? null }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="primary_video">Video</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input accept=".mp4, .webm | Video"
                                       type="file" id="primary_video" name="primary_video" class="custom-file-input" value="">
                                <label class="custom-file-label" for="primary_video">Choose file</label>
                            </div>
                        </div>
                        <small class="text-danger">Depending on the file size, the upload time may take longer!</small>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>


        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <video controls src="{{ empty($content['video']['url']) ? '' : url($content['video']['url']) }}" width="auto" height="750px"></video>
        </div>
    </div>
@endsection