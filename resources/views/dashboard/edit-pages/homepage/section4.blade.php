@extends('dashboard._layout.general-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('edit-pages.homepage.section4') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group-wrapper">
                        <div class="form-group">
                            <label>Select Product</label>
                            <select name="product" class="form-control">
                                @foreach($products as $product)
                                <option value="{{ $product->pd_id }}">{{ $product->title }} &nbsp;&nbsp;-->&nbsp;&nbsp; diameter :  {{ $product->diameter }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
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
                        <th>Action</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Materials</th>
                        <th>Negotiable</th>
                        <th>Date of Manufacture</th>
                        <th>Cargo Price</th>
                        <th>Cargo Time</th>
                        <th>Diameter</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Stock</th>
                        <th>List Price</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contents as $content)
                        <tr>
                            <td>{{ $content->p_id }}</td>
                            <td>
                                <a href="{{ route('delete.edit-page.section4', $content->id) }}"
                                   style="font-size: 12px" class="btn btn-danger">
                                    <i class="fa fa-trash-alt"></i>
                                </a>
                            </td>
                            <td>{{ $content->title }}</td>
                            <td>{{ $content->category }}</td>
                            <td>{{ $content->materials }}</td>
                            <td>{{ $content->negotiable }}</td>
                            <td>{{ $content->date_of_manufacture }}</td>
                            <td>{{ $content->cargo_price }}</td>
                            <td>{{ $content->cargo_time }}</td>
                            <td>{{ $content->diameter }}</td>
                            <td>{{ $content->height }}</td>
                            <td>{{ $content->weight }}</td>
                            @if($content->stock == 1)
                                <td>Var</td>
                            @elseif($content->stock == 0)
                                <td>Yok ama gelecek</td>
                            @else
                                <td>Yok</td>
                            @endif
                            <td>{{ $content->list_price }}</td>
                            <td>
                                <img width="75" height="75" src="/{{ json_decode($content->primary_image, TRUE)['url'] }}" alt="">
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Materials</th>
                        <th>Negotiable</th>
                        <th>Date of Manufacture</th>
                        <th>Cargo Price</th>
                        <th>Cargo Time</th>
                        <th>Diameter</th>
                        <th>Height</th>
                        <th>Weight</th>
                        <th>Stock</th>
                        <th>List Price</th>
                        <th>Image</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection