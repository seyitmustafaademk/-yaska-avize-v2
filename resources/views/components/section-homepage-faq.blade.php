<section class="faq-new pb-5">
    <div class="container pb-5">
        <div class="text-title text-center pb-5">
            <span>{{ $homepage_faq['top_title'] }}</span>
            <h1>{{ $homepage_faq['title'] }}</h1>
            <p>{{ $homepage_faq['description'] }}</p>
        </div>


        <div class="accordion">
            @foreach($homepage_faq['faq'] ?? [] as $key => $item)
            <div class="accordion-item">
                <button id="accordion-button-1" aria-expanded="false">
                    <span class="accordion-title">{{ $item['faq_title'] }}</span>
                    <span class="icon" aria-hidden="true"></span>
                </button>
                <div class="accordion-content">
                    <p>{!! $item['faq_description'] !!}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>