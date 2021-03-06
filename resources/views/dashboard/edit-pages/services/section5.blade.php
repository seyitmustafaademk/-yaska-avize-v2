@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('edit-pages.services.section5') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="faq_title">FAQ Title</label>
                            <input type="text" class="form-control" name="faq_title" id="faq_title">
                        </div>

                        <div class="form-group">
                            <label for="faq_description">FAQ Description</label>
                            <input type="text" class="form-control" name="faq_description" id="faq_description">
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
                SSS List
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="product-data-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($content != null)
                        @foreach($content['faq'] as $key => $faq)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <a href="{{ route('delete.edit-page.services.section5', $key) }}"
                                       style="font-size: 12px" class="btn btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td>{{ $faq['faq_title'] }}</td>
                                <td>{{ $faq['faq_description'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Title</th>
                        <th>Description</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection