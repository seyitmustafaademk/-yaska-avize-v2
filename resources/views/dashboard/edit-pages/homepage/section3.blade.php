@extends('dashboard._layout.general-layout')


@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('edit-pages.homepage.section3') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    @php
                        $contentt = json_decode($contents[0]->content, TRUE);
                    @endphp
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="desc_title">Description Title</label>
                            <input type="text" class="form-control" name="desc_title" id="desc_title" value="{{ $contentt['desc_title'] ?? null }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $contentt['description'] ?? null }}">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>

                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="url" class="form-control" name="url" id="url">
                        </div>
                        <div class="form-group">
                            <label for="file_primary_image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input accept=".jpg, .png, .jpeg, .tiff|image/*"
                                           required type="file" id="primary_image" name="primary_image" class="custom-file-input" value="">
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
                        <th>Descripton Title</th>
                        <th>Description</th>
                        <th>Title</th>
                        <th>URL</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $content)
                        @php
                            $content_data = json_decode($content->content, TRUE);
                        @endphp
                        <tr>
                            <td>{{ $content->id }}</td>
                            <td>
                                <a href="{{ route('delete.edit-page.section3', $content->id) }}"
                                   style="font-size: 12px" class="btn btn-danger">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{ $content_data['desc_title'] ?? '' }}</td>
                            <td>{{ $content_data['description'] ?? '' }}</td>
                            <td>{{ $content_data['title'] ?? '' }}</td>
                            <td>{{ $content_data['url'] ?? '' }}</td>
                            <td>{{ $content_data['image']['url'] ?? '' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Descripton Title</th>
                        <th>Description</th>
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