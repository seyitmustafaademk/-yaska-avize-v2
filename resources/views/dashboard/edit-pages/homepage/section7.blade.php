@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('edit-pages.homepage.section7') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                        <label for="exampleInputEmail1">Description</label>
                        <textarea type="text" class="form-control" name="description" id="description">{{ $content['description'] ?? null }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="customer_name">Customer Name</label>
                        <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ $content['customer_name'] ?? null }}">
                    </div>

                    <div class="form-group">
                        <label for="customer_description">Customer Description</label>
                        <input type="text" class="form-control" name="customer_description" id="customer_description" value="{{ $content['customer_description'] ?? null }}">
                    </div>
                    <div class="form-group">
                        <label for="file_primary_image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input accept=".jpg, .png, .jpeg, .tiff|image/*"
                                       type="file" id="primary_image" name="primary_image" class="custom-file-input" value="">
                                <label class="custom-file-label" for="primary_image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection