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
    </script>
@endsection
@section('content')
    <div class="step-tabs" data-index="4" data-title="Kargo Bilgileri">
        <form id="form-step-4" action="{{ route('admin.update-full-product') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-none" id="product_name" name="product_name" value="{{ $product->product_name }}" placeholder="placeholder" required>
                <label for="product_name" class="font-weight-normal">Ürün Adı</label>
            </div>
            <select name="category" class="form-select mb-3" id="category_{{$product->id}}">
                <option value="Antiquität" {{ $product->category == 'Antiquität' ? 'selected' : '' }}>Antika</option>
                <option value="Modern" {{ $product->category == 'Modern' ? 'selected' : '' }}>Modern</option>
                <option value="Produktteil" {{ $product->category == 'Produktteil' ? 'selected' : '' }}>Parça</option>
            </select>
            <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-none" id="materials" name="materials" placeholder="placeholder" value="{{ $product->materials }}" required>
                <label for="materials" class="font-weight-normal">Materyaller</label>
            </div>

            <select class="form-select shadow-none mb-3" name="production_date" placeholder="placeholder">
                @for($i = 1905; $i< 2030; $i++)
                    <option value="{{ $i }}" {{ $i == $product->date_of_manufacture ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
            <div class="form-check pb-2">
                <input class="form-check-input" type="checkbox" name="special_cargo" id="special_cargo" {{ $product->special_cargo == true ? 'checked' : '' }}>
                <label class="form-check-label" for="special_cargo">
                    Özel Kargo
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-none" id="cargo_time" name="cargo_time" placeholder="placeholder" value="{{ $product->cargo_time }}" required>
                <label for="cargo_time" class="font-weight-normal">Kargo Süresi</label>
            </div>
            <div class="form-floating mb-3">
                <input type="number" step="0.000001" class="form-control shadow-none" id="cargo_price" name="cargo_price" placeholder="placeholder" value="{{ $product->cargo_price }}" required>
                <label for="cargo_price" class="font-weight-normal">Kargo Ücreti</label>
            </div>
            <div class="mb-3">
                <input type="file" name="product_images[]" id="product_images" class="form-control form-control-lg font-weight-normal shadow-none" multiple required>
            </div>
            <label class="mt-3">Ek Teknik Özellikler</label>
            <div id="supplementary-material-container">
                @php
                    $material_list = json_decode($product->more_materials, TRUE);
                    $material_list = explode(',', $material_list);
                @endphp
                @foreach($material_list as $material)
                    <div class="form-floating input-group supplementary-material mt-3">
                        <span class="input-group-text">Teknik Özellik</span>
                        <input type="text" name="material_title[]" class="form-control shadow-none" placeholder="123" aria-label="123" value="{{ str_replace(['"', '{', '}'], '',  explode(':', $material)[0] ) }}" required>
                        <input type="text" name="material_description[]" class="form-control shadow-none" placeholder="123" aria-label="123" value="{{ str_replace(['"', '{', '}'], '',  explode(':', $material)[1] ) }}" required>
                        <a class="btn btn-danger btn-delete-material" type="button">Sil</a>
                    </div>
                @endforeach
            </div>
            <div class="form-floating mb-3 mt-3 d-flex justify-content-end">
                <a class="btn btn-outline-success py-2 w-100 text-uppercase w-100" id="btn-add-material">Başlık Ekle</a>
            </div>

            <div class="form-floating mb-3">
                <input type="text" class="form-control shadow-none" id="description_title" name="description_title" placeholder="placeholder" value="{{ $product->description_title }}" required>
                <label for="description_title" class="font-weight-normal">Başlık</label>
            </div>
            <div class="form-group">
                <label for="">Açıklama</label>
                <textarea id="summernote" name="description_content" required>
                    {!! $product->description_content !!}
                </textarea>
            </div>
            <input type="submit" class="btn btn-step w-100 font-weight-bold" value="Ürünü Güncelle">
        </form>
    </div>
@endsection