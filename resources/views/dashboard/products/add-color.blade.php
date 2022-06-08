@extends('dashboard._layout.general-layout')

@section('head-center')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{ asset('/admin-assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
@endsection
@section('footer-center')
    <!-- bootstrap color picker -->
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/3.2.0/js/bootstrap-colorpicker.min.js" > </script>
@endsection
@section('footer-bottom')
    <script>
        $('.my-colorpicker1').colorpicker()
    </script>
@endsection

@section('content')
        <div class="row">
            <div class="col-xxl-5 mb-5">
                <form class="form-signin" action="{{ route('admin.product.add-color') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row justify-content-between">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="color_name" id="color_name" placeholder="name@example.com" required>
                                <label for="floatingInput">Renk Adı</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center d-inline-block align-content-center">
                                <label for="color_hex_code" class="form-label">Eklenecek Renk Seç</label>
                                <input type="color" class="form-control form-control-color ms-3" name="color_hex_code" id="color_hex_code" value="#563d7c" title="Choose your color">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-start align-items-center mt-3">
                        <div class="col-6">
                            <div class="form-group float-right w-100">
                                <button type="submit" class="btn btn-primary text-white text-black w-100">Kaydet</button>
                            </div>
                        </div>
                    </div>
                </form>
                <form id="delete-color-form" action="{{ route('admin.product.delete-color') }}" method="POST">
                    @method('DELETE')
                    @csrf
                </form>
            </div>
            <div class="col-xxl-7">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Renkler Listesi</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="min-width: 50px">#</th>
                                <th>Renk Adı</th>
                                <th>Renk Kodu</th>
                                <th>Oluşturulma Tarihi</th>
                                <th>İşlem</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($colors as $color)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $color->color_name }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <span class="d-inline-block rounded-circle mr-2" style="width: 30px!important; height: 30px!important; background-color: {{ $color->color_hex_code }};"></span>
                                            {{ $color->color_hex_code }}
                                        </div>
                                    </td>
                                    <td>{{ $color->created_at }}</td>
                                    <td>
                                        <button type="submit" form="delete-color-form" name="id" class="btn btn-danger delete" value="{{ $color->id }}">Sil</button>
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