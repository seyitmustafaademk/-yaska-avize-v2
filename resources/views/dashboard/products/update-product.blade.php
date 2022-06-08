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
    $("#product-form").submit(function(event) {
        event.preventDefault();
        var post_url = $(this).attr("action");
        var request_method = $(this).attr("method");
        //var form_data = $(this).serialize();
        var form = $("#product-form")[0];
        var form_data = new FormData(form);
        var r_message = $('#added-product-message');

        $.ajax({
            url: post_url,
            type: request_method,
            data: form_data,
            processData: false, // Important!
            contentType: false,
            cache: false,
            success: function(response) {
                if (response.status_code == 'success') {
                    r_message.css('color', 'green');
                    toastr.success(response.status_message, 'Başarılı')
                    setTimeout(function() {
                        window.location.href = "{{ route('admin.add-product-detail') }}/" + response.pid;
                    }, 0);
                } else {
                    toastr.error(response.status_message, 'Başarısız!')
                }
            },
            error: function(response) {
                toastr.error('Bir hata oluştu!', 'HATA!')
            }
        });
    });
</script>
@endsection
<?php
if (isset($_GET['id'])) {

?>
    @section('content')
    @foreach($data as $product_detail)
    <div class="row">
        <div class="col-md-12 mb-5">
            <form id="product-form" action="{{ route('admin.update-product-post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <?php
                            if (isset($_GET['id']) && !empty($_GET['id'])) {
                                $id = $_GET['id'];
                            } else {
                                $id = NULL;
                            }
                            ?>
                            <input required type="hidden" name="id" value="{{ $id }}">
                            <input required type="text" name="title" class="form-control" value="{{ $product_detail->title }}" id="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category" class="form-control select2" style="width: 100%;" onchange="category_control()">
                                @foreach($categories as $category)
                                <option <?php if($category->category_name == $product_detail->category) { echo 'selected'; } ?> value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>









                    <?php if (isset($_GET['category']) && $_GET['category'] == 'Antika') { ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="date_of_manufacture">Hergestellt:</label>
                                <div class="input-group" id="date_text">
                                    <select name="date_of_manufacture" id="date_of_manufacture" class="form-control select2" style="width: 100%;">
                                    <?php for ($i = date('Y'); $i--; 1800 < $i) { ?>
                                        <option <?php if($i == $product_detail->date_of_manufacture) { echo 'selected'; } ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="materials">Materials</label>
                                <textarea required type="text" name="materials" class="form-control" id="materials" rows="2" placeholder="Malzemeleri virgül ile ayrılmış şekilde girin">{{ $product_detail->materials }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="cargo_date">Speditionslieferung</label>
                                <input required type="text" name="cargo_time" class="form-control" value="{{ $product_detail->cargo_time }}" id="123" pattern="[0-9]+">
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="date_of_manufacture">Hergestellt:</label>
                                <div class="input-group" id="date_text">
                                    <select name="date_of_manufacture" id="date_of_manufacture" class="form-control select2" style="width: 100%;"><?php for ($i = date('Y'); $i--; 1800 < $i) { ?><option value="<?php echo $i ?>"><?php echo $i ?></option><?php } ?></select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="materials">Materials</label>
                                <textarea required type="text" name="materials" class="form-control" id="materials" rows="2" placeholder="Malzemeleri virgül ile ayrılmış şekilde girin">{{ $product_detail->materials }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="cargo_price">Versand Kosten</label>
                                <input required type="text" name="cargo_price" value="{{ $product_detail->cargo_price }}" class="form-control" id="123">
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="form-group">
                                <label for="cargo_date">Speditionslieferung</label>
                                <input required type="text" name="cargo_time" class="form-control" value="{{ $product_detail->cargo_time }}" id="123" pattern="[0-9]+">
                            </div>
                        </div>
                    <?php } ?>









                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="stock">Stok</label>
                            <input required type="number" name="stock" class="form-control" id="123" value="{{ $product_detail->stock }}">
                        </div>
                    </div>
                </div>
                <hr>
             
                <div class="row">
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="desc_title">Description Title</label>
                            <input type="text" name="desc_title" class="form-control" value="{{ $product_detail->desc_title }}" id="desc_title">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-9">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="10" style="width: 100%!important;">{{ $product_detail->description }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group clearfix">
                            <label for="materials">Negotiable</label>
                            <div class="icheck-primary" style="font-size: 1.1em">
                                <input type="checkbox" name="negotiable" id="negotiable" checked>
                                <label for="negotiable">This item is negotiable</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-9">
                        <div class="form-group">
                            <label for="file_other_medias">Other Medias</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input required type="file" id="other_medias" name="other_medias[]" multiple class="custom-file-input">
                                    <label class="custom-file-label" for="other_medias">Choose files</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" id="add-product-btn" class="btn btn-primary float-right px-5">Save</button>
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-black" id="added-product-message"></p>
                </div>
            </form>
        </div>
    </div>
    <script>
        function category_control() {
            var select = document.getElementById('category');
            var category = select.options[select.selectedIndex].text;
            if (category == 'Antika') {
                document.getElementById("date_text").innerHTML = ' <select name="date_of_manufacture" value="{{ $product_detail->date_of_manufacture }}" id="date_of_manufacture" class="form-control select2" style="width: 100%;"><?php for ($i = date('Y'); $i--; 1800 < $i) { ?><option value="<?php echo $i ?>"><?php echo $i ?></option><?php } ?></select>';
            } else {
                document.getElementById("date_text").innerHTML = '<input required type="date" name="date_of_manufacture" value="{{ $product_detail->date_of_manufacture }}"  id="date_of_manufacture" class="form-control datetimepicker-input" data-target="#reservationdate" />';
            }
        }
    </script>
    @endforeach
    @endsection
<?php } ?>