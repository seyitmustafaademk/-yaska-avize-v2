@extends('dashboard._layout.general-layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('edit-pages.homepage.section3') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="desc_title">Description Title</label>
                            <input type="text" class="form-control" name="desc_title" id="title" value="{{ $contents['section_title'] ?? null }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $contents['section_description'] ?? null }}" required>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="list_title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" class="form-control" name="list_url" id="url">
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
                        <th>Title</th>
                        <th>URL</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(($contents['section_content'] ?? []) as $content)
                        <tr>
                            <td>{{ $content['id'] }}</td>
                            <td>
                                <a href="{{ route('delete.edit-page.section3', $content['id']) }}"
                                   style="font-size: 12px" class="btn btn-danger">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{ $content['title'] ?? '' }}</td>
                            <td>{{ $content['url'] ?? '' }}</td>
                            <td>
                                <img src="{{ url($content['primary_image']['url'] ?? '#') }}" alt="" height="75" width="75">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Image</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection