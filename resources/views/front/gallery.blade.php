@extends('front.layout.master')
@section('head-bottom')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .img-wrapper {
            max-height: 300px;
            overflow: hidden;
            object-fit: cover;
            object-position: center center;
        }
    </style>
@endsection
@section('footer-bottom')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row my-5 pt-5">
            @foreach($homepage_gallery as $homepage_gallery_item)
                <div class="img-wrapper my-3 col-6 col-md-2 col-lg-3">
                    <a data-fancybox="gallery mx-3" href="{{ asset($homepage_gallery_item['url']) }}">
                        <img src="{{ $homepage_gallery_item['url'] }}">
                    </a>
                </div>
            @endforeach
            @foreach($gallery as $image)
                <div class="img-wrapper my-3 col-6 col-md-2 col-lg-3">
                    <a data-fancybox="gallery mx-3" href="{{ asset($image-> media_url) }}">
                        <img src="{{ $image->media_url }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection