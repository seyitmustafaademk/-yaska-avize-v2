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
                "responsive": true,
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["csv", "excel", "pdf",],
            }).buttons().container().appendTo('#product-data-table_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $('.btn-submitter').click(function (){
            var forms = $('.inline-form');
            for(let i = 0; i < forms.length; i++) {
                $(forms[i]).submit();
            }
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
                        <th>Ürün Adı</th>
                        <th>Kategori</th>
                        <th>Materyaller</th>
                        <th>Üretim Tarihi</th>
                        <th>Özel Kargo</th>
                        <th>Kargo Süresi</th>
                        <th>Kargo Ücreti</th>
                        <th>Resim</th>
                        <th>İşlem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key => $product)
                    <form action="{{ route('admin.update-product') }}" method="POST" id="ibn_form_{{ $product->id }}" class="inline-form" data-id="{{ $key }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}" form="ibn_form_{{ $product->id }}">
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><input type="text" name="product_name" value="{{ $product->product_name }}"  form="ibn_form_{{ $product->id }}"></td>
                            <td>
                                <select name="category" id="category_{{$product->id}}"  form="ibn_form_{{ $product->id }}">
                                    <option value="Antika" {{ $product->category == 'Antika' ? 'selected' : '' }}>
                                        Antika
                                    </option>
                                    <option value="Modern" {{ $product->category == 'Modern' ? 'selected' : '' }}>
                                        Modern
                                    </option>
                                    <option value="Parça" {{ $product->category == 'Parça' ? 'selected' : '' }}>Parça
                                    </option>
                                </select>
                            </td>
                            <td><input type="text" name="materials" value="{{ $product->materials }}"  form="ibn_form_{{ $product->id }}"></td>
                            <td>
                                <select name="date_of_manufacture" id="date_of_manufacture_{{ $product->id }}"  form="ibn_form_{{ $product->id }}">
                                    @for($i = 1905; $i< 2030; $i++)
                                        <option value="{{ $i }}" {{ $i == $product->date_of_manufacture ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </td>
                            <td><input type="checkbox" name="special_cargo" {{ $product->special_cargo == true ? 'checked' : '' }}  form="ibn_form_{{ $product->id }}"></td>
                            <td><input type="text" name="cargo_time" value="{{ $product->cargo_time }}"  form="ibn_form_{{ $product->id }}"></td>
                            <td><input type="number" step="0.000001" name="cargo_price" value="{{ $product->cargo_price }}"  form="ibn_form_{{ $product->id }}"></td>

                            <td>
                                <img src="{{ url(json_decode($product->product_images)[0]->url ?? 'https://via.placeholder.com/150/898989/FFFFFF?Text=NO%20IMAGE') }}" alt="" width="auto" height="75">
                            </td>
                            <td width="200px" style="width: 180px">
                                <button type="submit" class="btn btn-success btn-submitter" form="ibn_form_{{ $product->id }}" data-id="{{ $key }}">
                                    <i class="fas fa-save"></i>
                                </button>
                                <a href="{{ route('admin.update-full-product', '')}}/{{ $product->id }}" style="font-size: 12px" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.product-detail', '') }}/{{ $product->id }}" style="font-size: 12px" class="btn btn-success">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.delete-product', '') }}/{{ $product->id }}" style="font-size: 12px" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </form>

                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Ürün Adı</th>
                        <th>Kategori</th>
                        <th>Materyaller</th>
                        <th>Üretim Tarihi</th>
                        <th>Özel Kargo</th>
                        <th>Kargo Süresi</th>
                        <th>Kargo Ücreti</th>
                        <th>Resim</th>
                        <th>İşlem</th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
@endsection