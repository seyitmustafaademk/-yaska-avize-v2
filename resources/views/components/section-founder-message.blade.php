<div>
    @if($founder_message != null)
        <section class="founder">
            <div class="container-fluid gx-0 overflow-hidden py-5">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-4 founder-text order-2 order-xl-1 px-4 px-xl-0 py-3 py-xl-0">
                        <div class="text-title d-none d-lg-block">
                            <span>{{ $founder_message['top_title'] }}</span>
                            <h1>{{ $founder_message['title'] }}</h1>
                        </div>
                        <p>{!! $founder_message['description'] !!}</p>
                        <p class="mt-0 p-0 fw-bold">
                            {{ $founder_message['customer_name'] }}
                            <br>
                            <small class="fw-lighter">
                                {{ $founder_message['customer_description'] }}
                            </small>
                        </p>

                    </div>
                    <div class="col-xl-6 text-xl-end order-1 order-xl-2">
                        <div class="text-title d-lg-none text-center">
                            <span>{{ $founder_message['top_title'] }}</span>
                            <h1>{{ $founder_message['title'] }}</h1>
                        </div>
                        <img src="{{ url($founder_message['image']['url']) }}" alt="" class="w-100">
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>