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
    <a href="{{ route('admin.add-product-detail', $pid) }}" style="font-size: 12px" class="btn btn-info fs-1 py-3"> Add New Product Detail
        <i class="fa fa-plus "></i>
    </a>
    <div class="card-header">
        Product Detail List
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="product-data-table" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Manufacture</th>
                    <th>diameter</th>
                    <th>height</th>
                    <th>weight</th>
                    <th>Quantity</th>
                    <th>Artikelnummer</th>
                    <th>Farbe</th>
                    <th>Fassung</th>
                    <th>Leuchtmittel</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product_details as $product_detail)
                <tr>
                    <td>{{ $product_detail->id }}</td>

                    <td>{{ $product_detail->diameter }}</td>
                    <td>{{ $product_detail->height }}</td>
                    <td>{{ $product_detail->weight }}</td>
                    @if($product_detail->stock == 1)
                    <td>Var</td>
                    @elseif($product_detail->stock == 0)
                    <td>Yok ama gelecek</td>
                    @else
                    <td>Yok</td>
                    @endif
                    <td>{{ $product_detail->list_price }}</td>
                    <td>{{ $product_detail->item_number }}</td>
                    <td>{{ $product_detail->color }}</td>
                    <td>{{ $product_detail->version }}</td>
                    <td>{{ $product_detail->bulbs }}</td>
                    <td>
                        <img src="{{ url(json_decode($product_detail->primary_image, TRUE)['url']) }}" width="75" height="75">
                    </td>
                    <td width="100px" style="width: 100px">
                        <a href="{{ route('admin.delete-product-detail', [$product_detail->product_id, $product_detail->id]) }}" style="font-size: 12px" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                        <a href="{{ route('admin.update-product-detail') }}?id={{ $product_detail->id }}" style="font-size: 12px" class="btn btn-success">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Action</th>
                    <th>Manufacture</th>
                    <th>diameter</th>
                    <th>height</th>
                    <th>weight</th>
                    <th>Quantity</th>
                    <th>Image</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection