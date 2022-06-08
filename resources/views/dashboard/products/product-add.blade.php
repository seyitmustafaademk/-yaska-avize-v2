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
        $("#product-form").submit(function( event ) {
            event.preventDefault();
            var post_url = $(this).attr("action");
            var request_method = $(this).attr("method");
            var form_data = $(this).serialize();
            var r_message = $('#added-product-message');

            $.ajax({
                url: post_url,
                type: request_method,
                data: form_data,
                success: function (response){
                    console.log(response);
                    var status_code = parseInt(response.status_code);
                    if(status_code == 'success')
                        r_message.css('color', 'green');
                    else
                        r_message.css('color', 'red');
                    r_message.text(response.status_message);
                },
                error: function (response){
                    console.log(response);
                    r_message.css('color', 'red');
                    r_message.text("Bir hata oluştu!");
                }
            });
        });
    </script>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 mb-5">
        <input form="properties-form" type="hidden" id="pid" name="pid">
        <h4 class="border-top pt-3">Add Product</h4>
        <form id="product-form" action="{{ route('admin.add-product-post') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control select2" style="width: 100%;">
                            @foreach($categories as $category)
                                <option value="{{ $category }}">{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <!-- Date -->
                    <div class="form-group">
                        <label for="date_of_manufacture">Date of Manufacture:</label>
                        <div class="input-group">
                            <input type="date" name="date_of_manufacture" id="date_of_manufacture" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="materials">Materials</label>
                        <textarea type="text" name="materials" class="form-control" id="materials"
                                  rows="2" placeholder="Malzemeleri virgül ile ayrılmış şekilde girin"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group clearfix">
                        <label for="materials">Negotiable</label>
                        <div class="icheck-primary" style="font-size: 1.1em">
                            <input type="checkbox" name="negotiable" id="negotiable" checked>
                            <label for="negotiable">This item is negotiable</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" id="add-product-btn" class="btn btn-primary float-right px-5">Ürün Ekle</button>
                </div>
            </div>
            <div class="col-12">
                <p class="text-black">
                    <span class="added-product-message d-none"></span>
                </p>
            </div>
        </form>


        <h4 class="border-top pt-3">Add Product</h4>
        <form id="properties-form" action="{{ route('admin.add-property-post') }}" method="POST">
            @csrf
            <div class="row mt-2 pt-3">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="measurement">Measurement</label>
                        <input type="text" id="measurement" name="measurement" class="form-control"  placeholder="123">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input type="text" id="weight" name="weight" class="form-control"  placeholder="123">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="text" id="quantity" name="quantity" class="form-control"  placeholder="123">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="list_price">List Price</label>
                        <input type="text" id="list_price" name="list_price" class="form-control" placeholder="123">
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-black">
                        <span class="text-danger">**Bu alanlara sadece sayısal değer girin</span>
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="file_primary_image">Primary Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input accept=".jpg, .png, .jpeg, .tiff|image/*"
                                       type="file" id="file_primary_image" name="file_primary" class="custom-file-input">
                                <label class="custom-file-label" for="file_primary_image">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="file_other_medias">Other Medias</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input accept=".jpg, .png, .jpeg, .mp4 .tiff|image "
                                       type="file" id="file_other_medias" name="file_other_medias" class="custom-file-input">
                                <label class="custom-file-label" for="file_other_image_1">Choose file</label>
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
            <div class="col-12">
                <p class="text-black">
                    <span class="text-danger">**Bu alanlara sadece sayısal değer girin</span>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection




