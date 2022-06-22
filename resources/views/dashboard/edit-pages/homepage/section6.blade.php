@extends('dashboard._layout.general-layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('edit-pages.homepage.section6') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
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
                            <input type="text" class="form-control" name="description" id="description" value="{{ $content['description'] ?? null }}">
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
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @if(isset($content))
    <div class="row">
        <div class="card">
            <div class="card-header">
                List
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="product-data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Image Name</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($content['images'] as $key => $image)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <a href="{{ route('delete.edit-page.homepage.section6', $key) }}"
                                   style="font-size: 12px" class="btn btn-danger">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{ $image['name'] }}</td>
                            <td>
                                <a href="{{ url($image['url']) }}">
                                    <img src="{{ url($image['url']) }}" width="100" height="100">
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Image Name</th>
                        <th>Image</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    @endif
@endsection