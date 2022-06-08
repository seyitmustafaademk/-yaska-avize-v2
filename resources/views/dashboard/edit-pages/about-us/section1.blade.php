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
            <form action="{{ route('edit-pages.about-us.section1') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="top_title">Top Title</label>
                            <input required type="text" class="form-control" name="top_title" id="top_title">
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input required type="text" class="form-control" name="title" id="title">
                        </div>
                        <div class="form-group">
                            <label for="summernote">Description</label>
                            <textarea name="summernote" id="summernote"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="card">
            <div class="card-header">
                SSS List
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="product-data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Top Title</th>
                        <th>Title</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($content != null)
                        @foreach($content['about-data'] as $key => $about_data)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td width="150">
                                    <a href="{{ route('front.about-us') }}"
                                       style="font-size: 12px" class="btn btn-primary">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.edit-page.about-us.edit-content', $key) }}"
                                       style="font-size: 12px" class="btn btn-warning">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a href="{{ route('delete.edit-page.about-us.section1', $key) }}"
                                       style="font-size: 12px" class="btn btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td width="200">{{ $about_data['top_title'] }}</td>
                                <td width="200">{{ $about_data['title'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Top Title</th>
                        <th>Title</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection