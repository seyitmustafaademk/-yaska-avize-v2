<div>
    @if($homepage_faq != null)
    <section class="faq py-5">

        <div class="container py-5">
            <div class="text-title text-center pb-5">
                <span>{{ $homepage_faq['top_title'] }}</span>
                <h1>{{ $homepage_faq['title'] }}</h1>
                <p>{{ $homepage_faq['description'] }}</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    @foreach($homepage_faq['sss'] as $key => $item)
{{--                        <div class="accordion-item col-lg-6 px-1">--}}
{{--                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">--}}
{{--                                <button class="accordion-button " type="button" data-bs-toggle="collapse"--}}
{{--                                        data-bs-target="#panelsStayOpen-collapseOne-{{ $key }}" aria-expanded="true"--}}
{{--                                        aria-controls="panelsStayOpen-collapseOne-{{ $key }}">--}}
{{--                                    {{ $item['sss_title'] }}--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="panelsStayOpen-collapseOne-{{ $key }}" class="accordion-collapse collapse"--}}
{{--                                 aria-labelledby="panelsStayOpen-headingOne-{{ $key }}">--}}
{{--                                <div class="accordion-body">{!! $item['sss_description'] !!}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-bs-toggle="collapse" data-bs-parent="#accordion" data-bs-target="#collapseOne{{ $key }}" aria-expanded="true" aria-controls="collapseOne{{ $key }}">
                                            {{ $item['sss_title'] }}
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne{{ $key }}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne{{ $key }}">
                                    <div class="panel-body">
                                        <p>{!! $item['sss_description'] !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

</div>