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
    $(function() {
        $("#product-data-table").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["csv", "excel", "pdf", ],
        }).buttons().container().appendTo('#product-data-table_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Product List
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="product-data-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Materials</th>

                    <th>Negotiable</th>
                    <th>Manufacture</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>

                    <td>{{ $product->title }}</td>
                    <td>
                        <form action="/admin/stock-update" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" name="stock" value="{{ $product->stock }}">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit">Save</button>
                                </div>
                            </div>

                        </form>
                    </td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->materials }}</td>
                    <td>{{ $product->negotiable }}</td>
                    <td>{{ $product->date_of_manufacture }}</td>
                    <td>
                        <img src="/{{ json_decode($product->images, TRUE)[0]['url'] }}" width="75" height="75">
                    </td>
                    <td width="200px" style="width: 180px">
                        <a href="{{ route('admin.product-detail', $product->id) }}" style="font-size: 12px" class="btn btn-success">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.add-product-detail', $product->id) }}" style="font-size: 12px" class="btn btn-info">
                            <i class="fa fa-plus"></i>
                        </a>
                        <a href="{{ route('admin.update-product')}}?id={{ $product->id }}" style="font-size: 12px" class="btn btn-info">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('admin.delete-product', $product->id) }}" style="font-size: 12px" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Materials</th>

                    <th>Negotiable</th>
                    <th>Manufacture</th>
                    <th>Images</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection