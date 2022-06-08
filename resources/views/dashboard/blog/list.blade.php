@extends('dashboard._layout.general-layout')


@section('head-center')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('footer-center')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin-assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin-assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
@endsection
@section('footer-bottom')
    <script>
        $(function () {
            $("#product-data-table").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "buttons": ["csv", "excel", "pdf",],
            }).buttons().container().appendTo('#product-data-table_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            Ürünler Listesi
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="product-data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Image</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td width="140">
                            <div>
                                <a href="{{ route('front.blog-detail', $post->slug) }}"
                                   style="font-size: 12px" class="btn btn-info">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.blog.edit-content', $post->id) }}"
                                   style="font-size: 12px" class="btn btn-warning">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <a href="{{ route('admin.blog.delete-content', $post->id) }}"
                                   style="font-size: 12px" class="btn btn-danger">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category_name }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>

                            @if(isset($post->image) && $post->image != 'null')
                                <img src="{{ asset($post->image) }}" width="75" height="75">
                            @else
                                <img src='https://via.placeholder.com/75x75.png?text=NULL' alt="">
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Slug</th>
                    <th>Image</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
