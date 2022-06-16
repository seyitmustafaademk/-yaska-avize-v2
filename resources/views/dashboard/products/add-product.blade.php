@extends('dashboard._layout.general-layout')

@section('head-center')
{{-- Select2 --}}
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin-assets/plugins/summernote/summernote-lite.min.css') }}">

@endsection
@section('footer-center')
    <script src="{{ asset('admin-assets/plugins/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $('#summernote').summernote({
            placeholder: 'Ürün açıklaması girin...',
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'hr']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']]
            ],
        });
    </script>
@endsection

@section('footer-bottom')
    {{-- GLOBAL DEĞİŞKENLER --}}
<script>
    var g_diameter_count = 1;
    var g_input_product_name;
    var g_input_category;
    var g_input_materials;
    var g_input_production_date;
    var g_input_cargo_price;
    var g_input_cargo_time;
    var g_input_list_price;
    var g_input_product_images;
</script>
{{-- STEP CHANGER --}}
<script>
    var _step_form_dots = $('.step-form-dots');
    var _step_form_tabs = $('.step-tabs');
    var _step_form_title = $('#step-form-title');

    function ChangeStepDots(p_index) {
        _step_form_dots.removeClass('active');
        _step_form_dots.each( function (index, element){
            if(index < p_index){
                $(element).stop(true,true).addClass('active', 400);
            }
        });
    }
    function ChangeStepTabs(p_index){
        _step_form_tabs.addClass('d-none')
        _step_form_tabs.each(function (index, element){
            if (index + 1 === p_index){
                $(element).stop(true,true).removeClass('d-none', 400);
                _step_form_title.text($(element).data('title'));
            }
        });
    }

</script>
{{-- STEP 1 --}}
<script>
    var product_category_option = $('#product-category-option');
    $('.btn-category-select').click(function (){
        g_input_category = $(this).data('category');
        product_category_option.val(g_input_category);
        product_category_option.text(g_input_category);

        if(g_input_category === 'Antika' || g_input_category === 'Modern'){
            $('#production_date').removeClass('d-none');
        }
        ChangeStepDots(2);
        ChangeStepTabs(2);

        $('#form-step-2 .d-none input').attr('disabled', true);
        $('#form-step-2 .d-none input').addClass('d-none');
    });
</script>

{{-- STEP 2 --}}
<script>
    //region Teknik Özellik Ekleme ve Silme (HTML)
    $('#btn-add-material').click(function () {
        var html = `<div class="form-floating input-group supplementary-material mt-3">
                        <span class="input-group-text">Teknik Özellik</span>
                        <input type="text" name="material_title[]" class="form-control shadow-none" placeholder="123" aria-label="123" required>
                        <input type="text" name="material_description[]" class="form-control shadow-none" placeholder="123" aria-label="123" required>
                        <a class="btn btn-danger btn-delete-material" type="button">Sil</a>
                    </div>`;
        $('#supplementary-material-container').append(html);
    });
    $(document).on('click', '.btn-delete-material', function (){
        $(this).closest('.supplementary-material').remove();
    });
    //endregion


    $('#form-step-2').submit(function(event){
        event.preventDefault();
        ChangeStepDots(3);
        ChangeStepTabs(3);

        if(g_input_category === 'Antika'){
            $('#diamond-slot-wrapper').removeClass('d-none');
            $('#bulbs-wrapper').removeClass('d-none');
            $('#diameter-input-wrapper').removeClass('d-none');
        }
        if(g_input_category === 'Modern'){
            $('#diamond-slot-wrapper').removeClass('d-none');
            $('#bulbs-wrapper').removeClass('d-none');
            $('#diameter-input-wrapper').removeClass('d-none');
            $('#diameter-image-wrapper').removeClass('d-none');
            $('.replicator').removeClass('d-none');
        }


        // $('#form-step-3 .d-none input').attr('disabled', 'disabled');
        $('#form-step-3 .d-none input').attr('disabled', true);
        $('#form-step-3 .d-none input').addClass('d-none');

    });

</script>

{{-- STEP 3 --}}
<script>
    $('#btn-add-diameter').click(function (){
        g_diameter_count++;
        var html = `<div class="diameter">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="product_number" name="product_number[]" placeholder="123" required>
                                        <label for="product_number" class="font-weight-normal">Ürün Numarası</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="color" name="color[]" placeholder="123" required>
                                        <label for="color" class="font-weight-normal">Renk</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="diamond_slot" name="diamond_slot[]" placeholder="123" required>
                                        <label for="diamond_slot" class="font-weight-normal">Elmas Yuvası</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="bulbs" name="bulbs[]" placeholder="123" required>
                                        <label for="bulbs" class="font-weight-normal">Ampuller</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="diameter" name="diameter[]" placeholder="123" required>
                                        <label for="diameter" class="font-weight-normal">Çap</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="height" name="height[]" placeholder="123" required>
                                        <label for="height" class="font-weight-normal">Zincirsiz Yükseklik</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="weight" name="weight[]" placeholder="123" required>
                                        <label for="weight" class="font-weight-normal">Ağırlık</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" step="0.0001" class="form-control shadow-none" id="stock" name="stock[]" placeholder="placeholder">
                                        <label for="stock" class="font-weight-normal">Stok Adedi</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" step="0.0001" class="form-control shadow-none" id="list_price" name="list_price[]" placeholder="placeholder" required>
                                        <label for="list_price" class="font-weight-normal">Liste Ücreti</label>
                                    </div>
                                    <div class="mb-3">
                                        <input type="file" name="diameter_images[]" id="diameter_images" class="form-control form-control-lg font-weight-normal shadow-none diameter_images" multiple required>
                                    </div>
                                    <div class="form-floating w-100 mb-3 mt-3" id="btn-add-diameter-wrap">
                                        <a class="btn btn-outline-danger py-2 w-100 text-uppercase w-100 font-weight-bold btn-delete-diameter">Detayı Sil</a>
                                    </div>
                                    <hr>
                                </div>`;

        $('#diameter-wrapper').append(html);
    });

    $(document).on('click', '.btn-delete-diameter', function (){
        $(this).closest('.diameter').remove();
    });

    $('#form-step-3').submit(function(event){
        event.preventDefault();
        ChangeStepDots(4);
        ChangeStepTabs(4);
    });
</script>

{{-- STEP 4 --}}
<script>
    $('#form-step-4').submit(function(event){
        event.preventDefault();
        ChangeStepDots(5);
        ChangeStepTabs(5);
    });
</script>

{{-- STEP 5 --}}
<script>
    $('#form-step-5').submit(function (event){
        event.preventDefault();
        $('#modal-are-you-sure').modal('show');
    });

    $('#completed-form-submit').click(function (event) {
        $('#modal-are-you-sure').modal('hide');

        $('#modal-spinner').modal('show');


        var data = new FormData(document.forms['form-step-2']); // with the file input
        var data3 = jQuery(document.forms['form-step-3']).serializeArray();
        var data4 = jQuery(document.forms['form-step-4']).serializeArray();
        var data5 = jQuery(document.forms['form-step-5']).serializeArray();

        for (let i=0; i<data3.length; i++)
            data.append(data3[i].name, data3[i].value);
        for (let i=0; i<data4.length; i++)
            data.append(data4[i].name, data4[i].value);
        for (let i=0; i<data5.length; i++)
            data.append(data5[i].name, data5[i].value);

        $.each($("#product_images")[0].files, function(i, file) {
            data.append('product_images[]', file);
        });

        var object_count = document.getElementsByClassName('diameter_images').length;
        console.log('object count' ,object_count);
        for (var i = 0; i < object_count; i++) {
            image_count = document.getElementsByClassName('diameter_images')[i].files.length;
            console.log('image count' ,image_count);
            for (let x=0; x < image_count; x++)
                data.append(`diameter_images[diameter_${i+1}][]`, document.getElementsByClassName('diameter_images')[i].files[x]);
        }

        $.ajax({
            url: '{{ route('admin.add-product-post') }}',
            type: 'POST',
            // data: $('#form-step-2, #form-step-3, #form-step-4, #form-step-5').serialize(),
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            success: function (response){
                if (response.succeeded === true){
                    toastr.success(response.message);
                    $('#spinnerr').addClass('d-none');
                    $('#modal-spinner').modal('hide');
                    window.location.href = "{{ route('admin.products') }}";
                }
                else{
                    toastr.error(response.message);
                    console.log(response.message);
                    $('#spinnerr').addClass('d-none');
                    $('#icon-x').removeClass('d-none');
                }
            },
            error: function (response){
                toastr.error(response.message);
                console.log(response);
                $('#spinnerr').addClass('d-none');
                $('#icon-x').removeClass('d-none');
            }
        });
    });
</script>

{{-- SUBMİT FORM --}}


<script>
    $('#icon-x').click(function (event){
        event.preventDefault();
        $('#modal-spinner').modal('hide');
    });
    ChangeStepDots(1);
    ChangeStepTabs(1);
</script>
@endsection

@section('content')
    <section class="pt-3">
        <div class="container">
            <div class="step-order d-flex justify-content-center align-items-center">
                <a class="step-form-dots active" data-index="1"></a>
                <a class="step-form-dots" data-index="2"></a>
                <a class="step-form-dots" data-index="3"></a>
                <a class="step-form-dots" data-index="4"></a>
                <a class="step-form-dots" data-index="5"></a>
            </div>
            <div class="step-title text-center py-4">
                <div class="d-flex justify-content-center align-items-center">
                    <i class="bi bi-arrow-left fs-1 position-absolute start-0"></i>
                    <h1 class="p-3" id="step-form-title">Kategori Seç</h1>
                    <i class="bi bi-arrow-right fs-1 position-absolute end-0"></i>
                </div>
                <hr style="width: 50%; margin:0 auto; height: 3px; opacity: 1;">
            </div>
            <div class="step-content">
                {{-- STEP 1 TABS --}}
                <div class="step-tabs" data-index="1" data-title="Kategori Seçimi">
                    <div class="step-form m-auto text-center position-relative" id="step-form-1">
                        <a class="btn btn-step w-100 btn-category-select" data-category="Antika">Antika</a>
                        <a class="btn btn-step w-100 btn-category-select" data-category="Modern">Modern</a>
                        <a class="btn btn-step w-100 btn-category-select" data-category="Parça">Parça</a>
                    </div>
                </div>

                {{-- STEP 2 TABS --}}
                <div class="step-tabs" data-index="2" data-title="Ürün Detayları">
                    <form id="form-step-2" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="product_name" name="product_name" placeholder="placeholder" required>
                            <label for="product_name" class="font-weight-normal">Ürün Adı</label>
                        </div>
                        <div class="form-floating mb-3">
                            <div class="form-floating">
                                <select class="form-select shadow-none" id="category" name="category" aria-label="Floating label select example">
                                    <option id="product-category-option" value="" selected></option>
                                </select>
                                <label for="floatingSelect">Kategori</label>
                            </div>
                        </div>
                        {{-- Yeni ve Antika Ürünlerde  // Üretim Tarihi --}}
                        <div class="form-floating mb-3 d-none" id="production_date">
                            <select type="text" class="form-control shadow-none" name="production_date" placeholder="placeholder">
                                @for($i = 1905; $i< 2030; $i++)
                                    <option value="{{ $i }}" {{ $i == now()->year ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="product_images" id="product_images" class="form-control form-control-lg font-weight-normal shadow-none" multiple required>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="materials" name="materials" placeholder="placeholder" required>
                            <label for="materials" class="font-weight-normal">Materyaller</label>
                        </div>
                        <label class="mt-3">Ek Teknik Özellikler</label>
                        <div id="supplementary-material-container">
                        </div>
                        <div class="form-floating mb-3 mt-3 d-flex justify-content-end">
                            <a class="btn btn-outline-success py-2 w-100 text-uppercase w-100" id="btn-add-material">Başlık Ekle</a>
                        </div>
                        <input type="submit" class="btn btn-step w-100" value="Diğer Detaylara Devam Et">
                    </form>
                </div>

                {{-- STEP 3 TABS --}}
                <div class="step-tabs" data-index="3" data-title="Çap Detayları">
                    <div class="step-3-wrapper">
                        <form id="form-step-3" method="post">
                            <div id="diameter-wrapper">
                                <div class="diameter">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="product_number" name="product_number[]" placeholder="123" required>
                                        <label for="product_number" class="font-weight-normal">Ürün Numarası</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="color" name="color[]" placeholder="123" required>
                                        <label for="color" class="font-weight-normal">Red, Green, Blue</label>
                                    </div>
                                    {{-- Antika ve Modern ürünlerde olacak // Elmas yuvası --}}
                                    <div class="form-floating mb-3 d-none" id="diamond-slot-wrapper">
                                        <input type="text" class="form-control" id="diamond_slot" name="diamond_slot[]" placeholder="123" required>
                                        <label for="diamond_slot" class="font-weight-normal">Elmas Yuvası</label>
                                    </div>
                                    {{-- Antika ve mdoern ürünlerde olacak // ampuller --}}
                                    <div class="form-floating mb-3 d-none" id="bulbs-wrapper">
                                        <input type="text" class="form-control" id="bulbs" name="bulbs[]" placeholder="123" required>
                                        <label for="bulbs" class="font-weight-normal">Ampuller</label>
                                    </div>
                                    {{-- Modern ve Antika üründe olacak // çap --}}
                                    <div class="form-floating mb-3 d-none" id="diameter-input-wrapper">
                                        <input type="text" class="form-control" id="diameter" name="diameter[]" placeholder="123" required>
                                        <label for="diameter" class="font-weight-normal">Çap</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="height" name="height[]" placeholder="123" required>
                                        <label for="height" class="font-weight-normal">Zincirsiz Yükseklik</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="weight" name="weight[]" placeholder="123" required>
                                        <label for="weight" class="font-weight-normal">Ağırlık</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" step="0.0001" class="form-control shadow-none" id="stock" name="stock[]" placeholder="placeholder" required>
                                        <label for="stock" class="font-weight-normal">Stok Adedi</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="number" step="0.0001" class="form-control shadow-none" id="list_price" name="list_price[]" placeholder="placeholder" required>
                                        <label for="list_price" class="font-weight-normal">Liste Ücreti</label>
                                    </div>
                                    {{-- Sadece Modernde olacak --}}
                                    <div class="mb-3 d-none" id="diameter-image-wrapper">
                                        <input type="file" data-index name="diameter_images[]" id="diameter_images" class="form-control form-control-lg font-weight-normal shadow-none diameter_images" multiple>
                                    </div>

                                    {{-- Sadece Modern ürünlerde olacak --}}
                                    <div class="replicator d-none">
                                        <hr class="replicator" id="step-3-seperator">
                                    </div>
                                </div>
                            </div>
                            {{-- Sadece Modern ürünlerde --}}
                            <div class="replicator d-none">
                                <div class="form-floating mb-3 mt-3 d-flex justify-content-end" id="btn-add-diameter-wrap">
                                    <a class="btn btn-outline-success py-2 w-100 text-uppercase w-100 font-weight-bold" id="btn-add-diameter">Yeni Detay Ekle</a>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-step w-100 font-weight-bold" value="Sonraki">
                        </form>
                    </div>
                </div>

                {{-- STEP 4 TABS --}}
                <div class="step-tabs" data-index="4" data-title="Kargo Bilgileri">
                    <form id="form-step-4" method="post">
                        <div class="form-check pb-2">
                            <input class="form-check-input" type="checkbox" name="special_cargo" id="special_cargo">
                            <label class="form-check-label" for="special_cargo">
                                Özel Kargo
                            </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="cargo_time" name="cargo_time" placeholder="placeholder" required>
                            <label for="cargo_time" class="font-weight-normal">Kargo Süresi</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" step="0.0001" class="form-control shadow-none" id="cargo_price" name="cargo_price" placeholder="placeholder" required>
                            <label for="cargo_price" class="font-weight-normal">Kargo Ücreti</label>
                        </div>
                        <input type="submit" class="btn btn-step w-100 font-weight-bold" value="Sonraki">
                    </form>
                </div>

                {{-- STEP 5 TABS --}}
                <div class="step-tabs" data-index="5" data-title="Ürün Açıklaması">
                    <form id="form-step-5" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control shadow-none" id="description_title" name="description_title" placeholder="placeholder" required>
                            <label for="description_title" class="font-weight-normal">Başlık</label>
                        </div>
                        <div class="form-group">
                            <label for="">Açıklama</label>
                            <textarea id="summernote" name="description_content" required>
                                Ürün Açıkalaması....
                            </textarea>
                        </div>
                        <input type="submit" class="btn btn-step w-100 font-weight-bold" value="Ürünü Ekle">
                    </form>

                </div>
                <div class="logo pt-5 mt-5 text-center">
                    <img src="{{ asset('admin-assets/img/admin-svg/kristalkulturson-01.svg') }}" alt="" width="75">
                </div>
            </div>
        </div>
    </section>


    <div class="modal fade" id="modal-are-you-sure" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EMİN MİSİN?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ürünleri eklemek istiyor musunuz?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                    <button type="button" class="btn btn-primary" id="completed-form-submit">Yine de Kaydet</button>
                </div>
            </div>
        </div>
    </div>

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