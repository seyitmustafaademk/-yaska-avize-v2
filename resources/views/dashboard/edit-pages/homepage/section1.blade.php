@extends('dashboard._layout.general-layout')

@section('content')
<div class="row">
    <div class="col-12">
        <form action="{{ route('edit-pages.homepage.section1') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $content['title'] }}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea type="text" class="form-control" name="description" id="description">{{ $content['description'] }}</textarea>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection