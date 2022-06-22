@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('edit-pages.services.section6') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $content['title'] ?? null }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $content['description'] ?? null }}">
                        </div>
                        <br>
                        <hr>
                        <br>
                        <div class="form-group">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" class="form-control" name="customer_name" id="customer_name">
                        </div>

                        <div class="form-group">
                            <label for="customer_title">Customer Title</label>
                            <input type="text" class="form-control" name="customer_title" id="customer_title">
                        </div>
                        <div class="form-group">
                            <label for="user_comment">Comment</label>
                            <textarea rows="4" class="form-control" name="user_comment" id="user_comment"></textarea>
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
                        <th>Customer Name</th>
                        <th>Customer Title</th>
                        <th>Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($content != null)
                        @foreach($content['comments'] as $key => $comment)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>
                                    <a href="{{ route('delete.edit-page.services.section6', $key) }}"
                                       style="font-size: 12px" class="btn btn-danger">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                </td>
                                <td>{{ $comment['customer_name'] }}</td>
                                <td>{{ $comment['customer_title'] }}</td>
                                <td>{{ $comment['user_comment'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Customer Name</th>
                        <th>Customer Title</th>
                        <th>Comment</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection