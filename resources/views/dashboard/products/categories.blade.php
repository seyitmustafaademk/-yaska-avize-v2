@extends('dashboard._layout.general-layout')

@section('head-center')
    {{-- Select2 --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('footer-bottom')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-12">
            <form id="product-form" action="{{ route('admin.product.add-category') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="category_name" id="category_name" placeholder="name@example.com" required>
                    <label for="category_name">Kategori Adı</label>
                </div>
                <div class="form-group float-right w-100">
                    <button type="submit" id="add-product-btn" class="btn btn-info text-black w-100">Kaydet</button>
                </div>
            </form>
            <form id="delete-category-form" action="{{ route('admin.product.delete-category') }}" method="POST">
                @method('DELETE')
                @csrf
            </form>
        </div>
        <div class="col-md-8 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kategoriler Listesi</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 75px">#</th>
                            <th>Kategori Adı</th>
                            <th>Oluşturulma Tarihi</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td>
                                <button type="submit" form="delete-category-form" name="id" class="btn btn-danger delete" value="{{ $category->id }}">Sil</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
