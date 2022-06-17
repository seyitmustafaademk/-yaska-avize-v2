@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.gallery') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="file_primary_image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input accept=".jpg, .png, .jpeg, .mp4|media"
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

    @if(isset($gallery))
        <div class="row mt-5">
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
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($gallery as $image)
                            <tr>
                                <td>{{ $image->id }}</td>
                                <td>
                                    <a href="{{ route('admin.gallery-delete', $image->id) }}"
                                       style="font-size: 12px" class="btn btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ url($image->media_url) }}">
                                        @if($image->media_type == 'image')
                                            <img src="{{ asset($image->media_url) }}" width="150" height="150">
                                        @else
                                            <video src="{{ asset($image->media_url) }}" width="150" height="150"></video>
                                        @endif
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Action</th>
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