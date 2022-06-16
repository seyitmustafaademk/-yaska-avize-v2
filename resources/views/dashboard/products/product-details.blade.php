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
                    <th>Ürün ID</th>
                    <th>Ürün Numarası</th>
                    <th>Çap</th>
                    <th>Yükseklik</th>
                    <th>Ağırlık</th>
                    <th>Stok</th>
                    <th>Fiyat</th>
                    <th>Renk</th>
                    <th>Ampüller</th> {{-- bulbs --}}
                    <th>Ampul Türü</th> {{-- fassung / diamond slots --}}
                    <th>Action</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product_details as $product_detail)
                    <form action="{{ route('admin.product-detail-update-inline') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product_detail->id }}">
                        <input type="hidden" name="pid" value="{{ $product_detail->product_id }}">
                        <tr>
                            <td scope="col"><input type="text" name="product_number" value="{{ $product_detail->product_number }}"></td>
                            <td scope="col"><input type="text" name="diameter" value="{{ $product_detail->diameter }}"></td>
                            <td scope="col"><input type="text" name="height" value="{{ $product_detail->height }}"></td>
                            <td scope="col"><input type="text" name="weight" value="{{ $product_detail->weight }}"></td>
                            <td scope="col"><input type="number" step="0.00001" name="stock" value="{{ $product_detail->stock }}"></td>
                            <td scope="col"><input type="text" name="list_price" value="{{ $product_detail->list_price }}"></td>
                            <td scope="col"><input type="text" name="color" value="{{ $product_detail->color }}"></td>
                            <td scope="col"><input type="text" name="bulbs" value="{{ $product_detail->bulbs }}"></td>
                            <td scope="col"><input type="text" name="diamond_slots" value="{{ $product_detail->diamond_slots }}"></td>
                            <td scope="col">
                                <img src="{{ $product_detail->diameter_images[0]['url'] ?? 'https://via.placeholder.com/150/898989/FFFFFF?Text=NO%20IMAGE' }}" height="75" width="auto">
                            </td>

                            <td scope="col" width="100px" style="width: 100px">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save"></i>
                                </button>
                                <a href="{{ route('admin.delete-product-detail', [$product_detail->product_id, $product_detail->id]) }}" style="font-size: 12px" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                                {{--                        <a href="{{ route('admin.update-product-detail') }}?id={{ $product_detail->id }}" style="font-size: 12px" class="btn btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>--}}
                            </td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Ürün ID</th>
                    <th>Ürün Numarası</th>
                    <th>Çap</th>
                    <th>Yükseklik</th>
                    <th>Ağırlık</th>
                    <th>Stok</th>
                    <th>Fiyat</th>
                    <th>Renk</th>
                    <th>Ampüller</th> {{-- bulbs --}}
                    <th>Ampul Türü</th> {{-- fassung / diamond slots --}}
                    <th>Action</th>
                    <th>Image</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection