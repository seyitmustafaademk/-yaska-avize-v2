<div>
    @if($founder_message != null)
        <section class="founder">
            <div class="container-fluid gx-0 overflow-hidden py-5">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-4 founder-text order-2 order-xl-1 px-4 px-xl-0 py-3 py-xl-0">
                        <div class="text-title d-none d-lg-block">
                            <span>{{ $founder_message['top_title'] }}</span>
                            <h1>{{ $founder_message['top_title'] }}</h1>
                        </div>
                        <p>{!! $founder_message['description'] !!}</p>
                        <p class="mt-0 p-0 fw-bold">{{ $founder_message['customer_name'] }}</p>
                    </div>
                    <div class="col-xl-6 text-xl-end order-1 order-xl-2">
                        <div class="text-title d-lg-none text-center">
                            <span>{{ $founder_message['top_title'] }}</span>
                            <h1>{{ $founder_message['top_title'] }}</h1>
                        </div>
                        <img src="{{ url($founder_message['image']['url']) }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </section>

        {{--<section class="murset py-lg-5">
            <div class="container py-5">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-6">
                        <div class="img">
                            <div class="text-title text-center d-lg-none pb-4">
                                <span>{{ $founder_message['top_title'] }}</span>
                                <h1>{{ $founder_message['title'] }}</h1>
                            </div>
                            <img src="/{{ $founder_message['image']['url'] }}" alt="" class="pt-lg-5">
                            <div class="img-info d-none d-xxl-block">{{ $founder_message['top_title'] }}</div>
                        </div>
                    </div>
                    <div class="col-lg-5 pt-4 me-lg-5 pt-lg-5">
                        <div class="text-title d-none d-lg-block">
                            <span>{{ $founder_message['top_title'] }}</span>
                            <h1>{{ $founder_message['title'] }}</h1>
                        </div>
                        <p>{!! $founder_message['description'] !!}</p>
                        <p class="fs-4 fw-normal mb-0" style="letter-spacing: 2px;">
                            <span class="fw-bold">{{ $founder_message['customer_name'] }}</span>
                        </p>
                        <p class="mt-0 p-0">{!! $founder_message['customer_description'] !!}</p>
                    </div>
                </div>
            </div>
        </section>--}}
    @endif
</div>