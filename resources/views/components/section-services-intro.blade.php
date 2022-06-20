<div>
    @if($services_intro != null)
        <section class="detail-video py-lg-5">
            <div class="container-fluid g-0 overflow-hidden py-5 py-lg-0">
                <div class="row justify-content-between align-items-center" style="background: #0d0d16;">
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <div class="img position-relative">
                            <div class="text-title text-center d-lg-none pb-4">
                                <span class="text-white">{{ $services_intro['top_title'] }}</span>
                                <h1>{{ $services_intro['title'] }}</h1>
                            </div>
                            <video id="video-playerrr" src="/{{ $services_intro['video']['url'] }}" style="max-width: 100%; max-height: 85vh; width:100%; object-fit:cover;" loop muted autoplay></video>
                            <div class="position-absolute top-50 start-50 translate-middle">
{{--                                <!-- <a href="javascript:void(0)" class="videoPlay-btn" data-bs-toggle="modal" data-bs-target="#specialVideo">
                                    <img src="{{ asset('assets/img/product-detail/play-01.svg') }}" alt="" width="100">
                                </a> -->--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4 detail-video-text py-4 py-lg-0">
                        <div class="text-title d-none d-lg-block">
                            <span class="text-white">{{ $services_intro['top_title'] }}</span>
                            <h1 class="text-white">{{ $services_intro['title'] }}</h1>
                        </div>
                        <p class="text-white">{!! $services_intro['description'] !!}</p>
                    </div>
                </div>
            </div>
{{--            <!-- <div class="modal fade" id="specialVideo" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-centered">
                    <div class="modal-content">
                        <video src="/{{ $services_intro['video']['url'] }}" style="max-width: 100%; max-height: 85vh;" autoplay loop controls></video>
                    </div>
                </div>
            </div> -->--}}
        </section>
        <script>
            var vid = document.getElementById("video-playerrr");
            vid.autoplay = true;
            vid.load();
        </script>
    @endif
</div>