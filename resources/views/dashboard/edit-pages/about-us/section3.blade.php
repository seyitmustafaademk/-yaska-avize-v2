@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('admin.edit-pages.shop.section-1') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label for="customer_name">Top Title</label>
                            <input type="text" class="form-control" name="top_title" id="top_title" value="{{ $content['top_title'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="customer_name">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $content['title'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" id="description" value="{{ $content['description'] ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="reports_title">Reports Title</label>
                            <input type="text" class="form-control" name="reports_title" id="reports_title" value="{{ $content['description'] ?? '' }}">
                        </div>
                        <div class="form-group">
                            <label for="reports_title">Reports Description</label>
                            <input type="text" class="form-control" name="reports_title" id="reports_title" value="{{ $content['description'] ?? '' }}">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection