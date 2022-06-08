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

@section('content')
<div class="row">
    <div class="col-md-12 mb-5">
        <form id="product-form" action="{{ route('admin.add-product-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="category">Ürün eklemek istediğiniz kategoriyi seçiniz</label>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-4"></div>
                @foreach($categories as $category)
                <div class="col-sm-1">
                    <a href="{{ route('admin.add-product') }}?category={{ $category->category_name }}" style="padding:30px; font-size: 18px" class="btn btn-success">
                        {{ $category->category_name }}
                    </a>

                </div>
                @endforeach
            </div>
            <hr>

            <div class="col-12">
                <p class="text-black" id="added-product-message"></p>
            </div>
        </form>
    </div>
</div>
@endsection

<script>
    function category_control() {
        var select = document.getElementById('category');
        var category = select.options[select.selectedIndex].text;
        if (category == 'Antika') {
            document.getElementById("date_text").innerHTML = ' <select name="date_of_manufacture" id="date_of_manufacture" class="form-control select2" style="width: 100%;"><?php for ($i = date('Y'); $i--; 1800 < $i) { ?><option value="<?php echo $i ?>"><?php echo $i ?></option><?php } ?></select>';
        } else {
            document.getElementById("date_text").innerHTML = '<input required type="date" name="date_of_manufacture" id="date_of_manufacture" class="form-control datetimepicker-input" data-target="#reservationdate" />';
        }
    }
</script>