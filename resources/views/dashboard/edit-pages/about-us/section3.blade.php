@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.edit-pages.about-us.section-3') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="customer_name">Top Title</label>
                            <input type="text" class="form-control" name="top_title" id="top_title" value="{{ $content['top_title'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="customer_name">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $content['title'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $content['description'] ?? '' }}">
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="form-group">
                            <label for="reports_title">Interview Title</label>
                            <input type="text" class="form-control" name="interview_title" id="interview_title">
                        </div>
                        <div class="form-group">
                            <label for="reports_title">Interview Description</label>
                            <input type="text" class="form-control" name="interview_description" id="interview_description">
                        </div>
                        <div class="form-group">
                            <label for="interview_video">Interview Video</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="interview_video" name="interview_video" class="custom-file-input">
                                    <label class="custom-file-label" for="primary_image">Choose file</label>
                                </div>
                            </div>
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
                Interviews
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="product-data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Interview Title</th>
                        <th>Interview Description</th>
                        <th>Video</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($content['videos'] ?? [] as $key => $video)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td width="150">
                                    <a href="{{ route('admin.edit-pages.about-us.section-3-delete', $key + 1) }}"
                                       style="font-size: 12px" class="btn btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td width="200">{{ $video['interview_title'] }}</td>
                                <td width="200">{{ $video['interview_description'] }}</td>
                                <td>
                                    <video width="auto" height="250" controls src="{{ url($video['video']['url']) }}" ></video>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Interview Title</th>
                        <th>Interview Description</th>
                        <th>Video</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

@endsection