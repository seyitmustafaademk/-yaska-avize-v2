@extends('dashboard._layout.general-layout')

@section('head-center')
{{-- Select2 --}}
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('footer-bottom')
<script>
    var _step_form_dots = $('.step-form-dots');
    function ChangeStepDots(p_dot_index) {
        _step_form_dots.each( function (index, element){

        });


        for( i=0; i < _step_form_dots.length; i++ ){
        console.log( _step_form_dots[i] );
            if( _step_form_dots[0].dataset.index === p_dot_index ){
            }
        }
    }
    ChangeStepDots(4)
</script>
@endsection

@section('content')

    <section class="step-wrapper">
        <div class="container">
            <div class="step-order d-flex justify-content-center align-items-center">
                <a class="step-form-dots active" data-index="1"></a>
                <a class="step-form-dots" data-index="2"></a>
                <a class="step-form-dots" data-index="3"></a>
                <a class="step-form-dots" data-index="4"></a>
                <a class="step-form-dots" data-index="5"></a>
            </div>

            <form action="" class="py-4">
                <div class="step-form m-auto text-center position-relative" id="step-form-1">
                    <div class="step-title text-center py-4">
                        <div class="d-flex justify-content-center align-items-center">
                            <i class="bi bi-arrow-left fs-1 position-absolute start-0"></i>
                            <h1 class="p-3" id="step-form-title">Kategori Seç</h1>
                            <i class="bi bi-arrow-right fs-1 position-absolute end-0"></i>
                        </div>
                        <hr style="width: 50%; margin:0 auto; height: 3px; opacity: 1;">
                    </div>

                    <button type="submit" class="btn btn-step w-100">Antika</button>
                    <button type="submit" class="btn btn-step w-100">Modern</button>
                    <button type="submit" class="btn btn-step w-100">Parça</button>

                    <div class="logo pt-5 mt-5 text-center">
                        <img src="{{ asset('admin-assets/img/admin-svg/kristalkulturson-01.svg') }}" alt="" width="110">
                    </div>
                </div>
            </form>
        </div>
    </section>



    <div class="step-content">
        <!-- Step1 -->
        <div class="step1-tab" data-index="1" data-title="Kategori Seçimi">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div>
                <input type="file" class="form-control form-control-lg font-weight-normal" id="formFileLg">
            </div>
        </div>
        <!-- Step1 -->
        <div class="step1-tab" data-index="2" data-title="Ürün Detayları">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div>
                <input type="file" class="form-control form-control-lg font-weight-normal" id="formFileLg">
            </div>
        </div>
        <!-- Step1 -->
        <div class="step1-tab" data-index="3" data-title="Ürün Ek Detayları">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div>
                <input type="file" class="form-control form-control-lg font-weight-normal" id="formFileLg">
            </div>
        </div>
        <!-- Step1 -->
        <div class="step1-tab" data-index="4" data-title="Kargo Bilgileri">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div>
                <input type="file" class="form-control form-control-lg font-weight-normal" id="formFileLg">
            </div>
        </div>
        <!-- Step1 -->
        <div class="step1-tab" data-index="5" data-title="Ürün Açıklaması">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput" class="font-weight-normal">Email address</label>
            </div>
            <div>
                <input type="file" class="form-control form-control-lg font-weight-normal" id="formFileLg">
            </div>
        </div>

    </div>


{{--<div class="row">
    <div class="col-md-12 mb-5">
        <form id="product-form" action="{{ route('admin.add-product-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input required type="text" name="title" class="form-control" id="title" placeholder="Title">
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <div id="category_html">
                            <select name="category" id="category" class="form-control select2" style="width: 100%;" onchange="category_control()">
                                @foreach($categories as $category)
                                <option <?php if (isset($_GET['category']) && $_GET['category'] == $category->category_name) {
                                            echo 'selected';
                                        } ?> value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>









                <?php if (isset($_GET['category']) && $_GET['category'] == 'Antika') { ?>
                  
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
                            <textarea required type="text" name="materials" class="form-control" id="materials" rows="2" placeholder="Malzemeleri virgül ile ayrılmış şekilde girin"></textarea>
                        </div>
                    </div>
              
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="cargo_date">Speditionslieferung</label>
                            <input required type="text" name="cargo_time" class="form-control" id="123" pattern="[0-9]+">
                        </div>
                    </div>
                <?php } else { ?>
               
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="materials">Materials</label>
                            <textarea required type="text" name="materials" class="form-control" id="materials" rows="2" placeholder="Malzemeleri virgül ile ayrılmış şekilde girin"></textarea>
                        </div>
                    </div>

             
                    <div class="col-md-6 col-lg-3">
                        <!-- Date -->
                        <div class="form-group">
                            <label for="date_of_manufacture">Hergestellt:</label>
                            <div class="input-group" id="date_text">
                                <input required type="date" name="date_of_manufacture" id="date_of_manufacture" class="form-control datetimepicker-input" data-target="#reservationdate" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="cargo_price">Versand Kosten</label>
                            <input required type="text" name="cargo_price" class="form-control" id="123">
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="form-group">
                            <label for="cargo_date">Speditionslieferung</label>
                            <input required type="text" name="cargo_time" class="form-control" id="123" pattern="[0-9]+">
                        </div>
                    </div>
                <?php } ?>




                <div class="col-md-6 col-lg-3">
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input required type="number" name="stock" class="form-control" id="123">
                    </div>
                </div>



            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="form-group">
                        <label for="desc_title">Description Title</label>
                        <input type="text" name="desc_title" class="form-control" id="desc_title">
                    </div>
                </div>
                <div class="col-md-6 col-lg-12">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3" style="width: 100%!important;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6 col-lg-12">
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
                <div class="col-md-6 col-lg-12">
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
                <p class="text-black" id="added-product-message"></p>
            </div>
        </form>
    </div>
</div>--}}
@endsection


{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}
{{-----------------------------------------------------------------------------------------------------}}