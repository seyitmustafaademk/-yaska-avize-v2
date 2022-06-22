@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover table-responsive">
                        <thead>
                        <tr>
                            <th>Operation</th>
                            <th>Status</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone Number</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Product Name</th>
                            <th>Created At</th>
                            <th>Image</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($contacts as $key => $contact)
                            <tr aria-expanded="false">
                                <td id="contact-operation" width="150" data-status="{{ $contact->read }}" data-id="{{ $contact->id }}">
                                    <button type="button" class="badge badge-success badge-btn contact-read-data" style="border-width: 0!important;">
                                        <i class="fas fa-eye" style="font-size: 1rem!important;"></i>
                                        <div class="d-none" id="contact-content-{{ $contact->id }}">{{ $contact->message }}</div>
                                    </button>

                                    <button class="readed-data badge badge-info badge-btn" style="border-width: 0!important;">
                                        <i class="fab fa-readme" style="font-size: 1rem!important;"></i>
                                    </button>

                                    <button class="delete-data badge badge-danger badge-btn" style="border-width: 0!important;">
                                        <i class="fas fa-trash" style="font-size: 1rem!important;"></i>
                                    </button>
                                </td>
                                @if($contact->read == 1)
                                    <td><span id="contact-read" class="badge badge-success">OKUNDU</span></td>
                                @else
                                    <td><span id="contact-read" class="badge badge-danger">OKUNMADI</span></td>
                                @endif
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->firstname . ' ' . $contact->lastname }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone_number }}</td>
                                <td id="contact-subject" >{{ $contact->subject }}</td>
                                <td id="contact-message" style="min-width: 450px; max-width: 450px; max-height: 150px; overflow: hidden;">
                                <span style="width: 100%; height: 50px; padding: 10px 15px 0; overflow-x: auto;  word-wrap: break-word;">
                                    {{  strlen($contact->message) > 150 ? substr($contact->message, 0, 150) . ' ...' : $contact->message }}
                                </span>
                                <td>{{ $contact->product_name }}</td>
                                </td>
                                <td >
                                    {{ $contact->created_at }}
                                </td>
                                <td>
                                    <a href="{{ url($contact->image ?? '#') }}" target="_blank">
                                        <img src="{{ $contact->image ? url($contact->image) : 'https://via.placeholder.com/100x100?text=No%20Image'  }}" width="auto" height="100" alt="">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="modal_contact_read" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Mesaj İçeriği</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div id="modal-body" class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection


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
        $('.contact-read-data').click(function (){
            let _modal = $('#modal_contact_read');
            let content_id = $(this).parent().data('id');
            console.log(content_id);
            let content = $('#contact-content-' + content_id).text();

            _modal.find('#modal-body').text(content);
            _modal.modal('show');


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
                        '_token': "{{ csrf_token() }}",
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
                    '_token': '{{ csrf_token() }}',
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
                    '_token': '{{ csrf_token() }}',
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
