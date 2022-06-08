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
        $(".delete").click(function( event ) {
            event.preventDefault();
            var post_url = $(this).attr("href");
            var id = $(this).data("id");
            var request_method = 'POST';

            var delete_btn = $(this);
            $.ajax({
                url: post_url,
                type: request_method,
                data: {
                    '_token': "{{csrf_token()}}",
                    'id': id,
                },
                success: function (response){
                    if(response.status_code === 'success') {
                        toastr.success(response.status_message, 'Başarılı');
                        delete_btn.closest('tr').remove();
                    }
                    else {
                        toastr.error(response.status_message, 'Başarısız!')
                    }
                },
                error: function (){
                    toastr.error('Bir hata oluştu!', 'HATA!')
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kategoriler Listesi</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Kategori Adı</th>
                            <th>İşlem</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <a href="{{ route('admin.blog.delete-category') }}" class="btn btn-danger delete" data-id="{{ $category->id }}">Sil</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-6 col-12">
            <form id="product-form" action="{{ route('admin.blog.add-category') }}" method="POST">
                @csrf
                <div class="col-lg-6 col-12">
                    <div class="form-group">
                        <label for="category_name">Kategori Adı</label>
                        <input required type="text" name="category_name" class="form-control" id="category_name" placeholder="Kategori Adı">
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <button type="submit" id="add-product-btn" class="btn btn-primary px-5">Kategori Ekle</button>
                </div>
            </form>
        </div>
    </div>
@endsection
