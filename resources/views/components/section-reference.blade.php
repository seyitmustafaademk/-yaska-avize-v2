<div>


    <!-- Breathing in, I calm body and mind. Breathing out, I smile. - Thich Nhat Hanh -->
    @if($section_data != null)
        <section class="faq">
            <div class="container pb-3">
                <div class="reference-wrapper py-5">
                    <div class="text-title text-center pb-5">
                        <span >{{ $section_data['top_title'] }}</span>
                        <h1>{{ $section_data['title'] }}</h1>
                        <p>{!! $section_data['description'] !!}</p>
                    </div>
                    <div class="swiper justify-content-between reference-slide py-3">
                        <div class="swiper-wrapper align-items-center">
                            @foreach($section_data['images'] as $image)
                            <div class="swiper-slide">
                                <a href="{{ $image['image_url'] }}">
                                    <img src="{{ url($image['url']) }}" alt="" class="img-fluid">
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</div>