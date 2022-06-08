@extends('dashboard._layout.general-layout')

@section('head-center')
    {{-- Toastr --}}
    <link rel="stylesheet" href="{{ asset('admin-assets/plugins/toastr/toastr.min.css') }}">
@endsection
@section('footer-center')
    {{-- Toastr --}}
    <script src="{{ asset('admin-assets/plugins/toastr/toastr.min.js') }}"></script>
@endsection
@section('footer-bottom')
    <script>
        var token = $("meta[name='csrf-token']").attr('content');
        // delete contact
        $('.delete-data').click(function (){
            var elmnt = $(this).parent();
            var id = elmnt.data('id');
            $.ajax({
                url: '{{ url('admin/contact/') }}',
                type: 'DELETE',
                data: {
                    'id': id,
                    '_token': token,
                },
                success: function (response){
                    var status_code = parseInt(response.status_code);
                    if (status_code === 200){
                        toastr.success(response.response_message);
                        elmnt.closest('tr').remove();
                    }
                    else if(status_code === 406)
                        toastr.warning(response.response_message)
                    else{
                        toastr.error('Bir hata oluştu, lütfen daha sonra tekrar deneyin.');
                        console.log(response);
                    }
                },
                error: function (response){
                    toastr.error('Bir hata oluştu, lütfen daha sonra tekrar deneyin.');
                    console.log(response);
                }
            });
        });
        // read-unread contact
        $('.readed-data').click(function (){
            var elmnt = $(this).parent();
            var id = elmnt.data('id');
            var status = elmnt.data('status');
            $.ajax({
                url: '{{ url('admin/contact/') }}',
                type: 'PUT',
                data: {
                    'id': id,
                    'status': status,
                    '_token': token,
                },
                success: function (response){
                    var status_code = parseInt(response.status_code);
                    if (status_code === 200){
                        toastr.success(response.response_message);
                        var badge = elmnt.parent().find('#contact-read');
                        if (response.read === true){
                            elmnt.data('status', 1);
                            badge.addClass('badge-success');
                            badge.removeClass('badge-danger');
                            badge.text('OKUNDU')
                        }
                        else{
                            elmnt.data('status', 0);
                            badge.removeClass('badge-success');
                            badge.addClass('badge-danger');
                            badge.text('OKUNMADI')
                        }
                    }
                    else if(status_code === 406)
                        toastr.warning(response.response_message)
                    else{
                        toastr.error('Bir hata oluştu, lütfen daha sonra tekrar deneyin.');
                        console.log(response);
                    }
                },
                error: function (response){
                    toastr.error('Bir hata oluştu, lütfen daha sonra tekrar deneyin.');
                    console.log(response);
                }
            });
        });
        // show read-unread contact
        $('.read-data').click(function (){
            var subject = $('#contact-subject').text();
            var messagee = $('#contact-message').text();
            $('#modal-title').text(subject);
            $('#modal-body').text(messagee);
            var elmnt = $(this).parent();
            var status = elmnt.data('status');
            var id = elmnt.data('id');
            if (status !== 1)
                $.ajax({
                    url: '{{ url('admin/contact/') }}',
                    type: 'PUT',
                    data: {
                        'id': id,
                        'status': 0,
                        '_token': token,
                    },
                    success: function (response){
                        var status_code = parseInt(response.status_code);
                        if (status_code === 200){
                            {{-- toastr.success(response.response_message); --}}
                            var badge = elmnt.parent().find('#contact-read');
                            elmnt.data('status', 1);
                            badge.addClass('badge-success');
                            badge.removeClass('badge-danger');
                            badge.text('OKUNDU');
                        }
                        else if(status_code === 406)
                            toastr.warning(response.response_message)
                        else{
                            toastr.error('Bir hata oluştu, lütfen daha sonra tekrar deneyin.');
                            console.log(response);
                        }
                    },
                    error: function (response){
                        toastr.error('Bir hata oluştu, lütfen daha sonra tekrar deneyin.');
                        console.log(response);
                    }
                });
        });
    </script>
@endsection


@section('content')
    <div class="card">
        <div class="card-header">
            Ürünler Listesi
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="product-data-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Goto Detail</th>
                    <th>Price</th>
                    <th>Paid Price</th>
                    <th>Order Status</th>
                    <th>Payment Status</th>
                    <th>İyzico Commission Fee</th>
                    <th>Iyzico Commission Rate Amount</th>
                    <th>Order Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>
                            <a href="{{ route('admin.order-detail', $order->order_id) }}"
                               style="font-size: 12px" class="btn btn-info">
                                <i class="fa fa-plus"></i>
                            </a>
                        </td>
                        <td>
                            {{ $order->price }}
                        </td>
                        <td>
                            {{ $order->paid_price }}
                        </td>
                        <td>
                            {{ $order->order_status }}
                        </td>
                        <td>
                            {{ $order->payment_status }}
                        </td>
                        <td>
                            {{ $order->iyzi_commission_fee }}
                        </td>
                        <td>
                            {{ $order->iyzi_commission_rate_amount }}
                        </td>
                        <td>
                            {{ $order->updated_at }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>#</th>
                    <th>Goto Detail</th>
                    <th>Price</th>
                    <th>Paid Price</th>
                    <th>Order Status</th>
                    <th>Payment Status</th>
                    <th>İyzico Commission Fee</th>
                    <th>Iyzico Commission Rate Amount</th>
                    <th>Order Date</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
@endsection