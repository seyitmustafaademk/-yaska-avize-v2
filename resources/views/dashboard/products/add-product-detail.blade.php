@extends('dashboard._layout.general-layout')

@section('head-center')
{{-- Select2 --}}
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('footer-bottom')
<script>
    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
</script>

<script>
    $("#properties-form").submit(function(event) {
        event.preventDefault();
        var post_url = $(this).attr("action");
        var request_method = $(this).attr("method");
        var form = $("#properties-form")[0];
        var data = new FormData(form);

        $.ajax({
            url: post_url,
            type: request_method,
            data: data,
            processData: false, // Important!
            contentType: false,
            cache: false,
            success: function(response) {
                if (response.status_code === 'success') {
                    toastr.success(response.status_message, 'Başarılı')
                    $(this).trigger('reset');
                } else {
                    toastr.error(response.status_message, 'Başarısız')
                }
            },
            error: function(response) {
                toastr.error('Bir hata oluştu!', 'HATA!')
            }
        });
    });
</script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-5">
        <form id="properties-form" action="{{ route('admin.add-product-detail') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 col-lg-4">
                <div class="form-group">
                    <label for="title">Product ID</label>
                    <input readonly required type="text" name="pid" class="form-control" id="pid" value="{{ $pid }}" placeholder="Product ID" pattern="[0-9]+">
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label for="item_number">Artikelnummer</label>
                        <input type="text" name="item_number" class="form-control" id="item_number">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label for="color">Farbe</label>
                        <input type="text" name="color" class="form-control" id="color">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label for="version">Fassung</label>
                        <input type="text" name="version" class="form-control" id="version">
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label for="bulbs">Leuchtmittel</label>
                        <input type="text" name="bulbs" class="form-control" id="bulbs">
                    </div>
                </div>
            </div>
            <div class="row mt-2 pt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="diameter">Durchmesser</label>
                        <input required type="text" id="diameter" name="diameter" class="form-control" placeholder="123" pattern="[0-9]+">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="height">höhe</label>
                        <input required type="text" id="height" name="height" class="form-control" placeholder="123" pattern="[0-9]+">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input required type="text" id="weight" name="weight" class="form-control" placeholder="123" pattern="[0-9]+">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="stock">Stock</label>
                        <select name="stock" id="stock" class="form-control">
                            <option value="1" selected>Var</option>
                            <option value="0">Yok ama gelecek</option>
                            <option value="-1">Yok</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="list_price">List Price</label>
                        <input required type="text" id="list_price" name="list_price" class="form-control" placeholder="123" pattern="[0-9]+">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="file_primary_image">Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input accept=".jpg, .png, .jpeg, .tiff|image/*" required type="file" id="primary_image" name="primary_image" class="custom-file-input">
                                <label class="custom-file-label" for="primary_image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" id="add-property-btn" class="btn btn-primary float-right px-5">Özellik Ekle</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection