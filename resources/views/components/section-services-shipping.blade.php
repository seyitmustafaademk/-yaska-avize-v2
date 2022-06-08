<div>
    @if($shipping != null)
        <section class="special-packet py-lg-2">
            <div class="container py-5">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="img_2">
                            <div class="text-title d-lg-none pb-4">
                                <span>{{ $shipping['top_title'] }}</span>
                                <h1>{{ $shipping['title'] }}</h1>
                            </div>
                            <img src="{{ url($shipping['image']['url']) }}" alt="{{ $shipping['image']['name'] }}" class="pt-lg-5">
                            <div class="img-info d-none d-xxl-block">
                                {{ $shipping['top_title'] }}
                            </div>
                        </div>
{{--                        <div class="d-flex special-packet-bottom">
                            <div class="special-packet-bottom-item">
                                <img src="{{ url($shipping['image']['url']) }}" alt="{{ $shipping['image']['name'] }}" width="100%" height="auto">
                            </div>
                        </div>--}}
                    </div>
                    <div class="col-lg-5 pt-4 me-lg-5 pt-lg-5 order-2 order-lg-1">
                        <div class="text-title d-none d-lg-block">
                            <span>{{ $shipping['top_title'] }}</span>
                            <h1>{{ $shipping['title'] }}</h1>
                        </div>
                        <p>
                            {!! $shipping['description'] !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>