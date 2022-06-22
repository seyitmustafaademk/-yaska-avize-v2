@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.edit-pages.shop.section-1') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="customer_name">Top Title</label>
                            <input type="text" class="form-control" name="top_title" id="top_title" value="{{ $content['top_title'] }}">
                        </div>
                        <div class="form-group">
                            <label for="customer_name">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $content['title'] }}">
                        </div>

                        <div class="form-group">
                            <label for="description">Comment</label>
                            <textarea rows="4" class="form-control" name="description" id="summernote">{!! $content['description'] !!}</textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection