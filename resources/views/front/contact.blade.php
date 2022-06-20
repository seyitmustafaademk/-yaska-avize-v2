@extends('front.layout.master')

@section('footer-bottom')
    <script>
        $("#contact-form").submit(function( event ) {
            event.preventDefault();
            var r_message = $('#contact-message');

            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                dataType: "JSON",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (response){
                    console.log(response.status_message);
                    var status_code = response.status_code;
                    if(status_code == "success")
                        r_message.css('color', 'green');
                    else if(status_code == "warning")
                        r_message.css('color', 'orange');
                    else
                        r_message.css('color', 'red');
                    r_message.text(response.status_message);
                },
                error: function (response){
                    console.log(response);
                    r_message.css('color', 'red');
                    r_message.text("Bir hata oluştu!");
                }
            });
            // $(this).trigger('reset');
        });
    </script>
@endsection

@section('content')

    <div class="contact-wrapper">
        <section class="contact-top-info">
            <div class="container py-5">
                <h1 class="text-center">Kontakt</h1>
                <p class="text-center">Als Fachgeschäft für Kronleuchter und Beleuchtung beraten und betreuen wir Sie gerne bei der funktionalen und stilvollen Einrichtung von Privat- und Gewerbeobjekten.</p>
                <div class="row justify-content-center justify-content-lg-between">
                    <div class="col-lg-4">
                        <div class="contact-top-info-inner text-center">
                            <i class="bi bi-envelope display-3"></i>
                            <h3 class="pt-3">E-Mail</h3>
                            <span class="pt-3 text-muted fs-6 text-uppercase">info@kristallkultur.com</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-top-info-inner text-center">
                            <i class="bi bi-telephone display-3"></i>
                            <h3 class="pt-3">Telefon</h3>
                            <span class="pt-3 text-muted fs-6 text-uppercase">+4930 347 66 749</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-top-info-inner text-center">
                            <i class="bi bi-clock display-3"></i>
                            <h3 class="pt-3">Montag bis Samstag</h3>
                            <span class="pt-3 text-muted fs-6 text-uppercase">MO-SA 13:00 – 18:00</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact-info-form" id="contactInfoForm">
            <div class="container py-5">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-7">
                        <div class="contact-info-form-inner shadow px-3 py-4">
                            <div class="mb-4 text-white p-2">
                                <h5 class="text-center text-warning">Fordern Sie jetzt Ihr unverbindliches und individuelles Angebot an!</h5>
                            </div>
                            <form id="contact-form" action="{{ route('front.contact') }}" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    <input type="hidden" name="page" value="contact">
                                    <div class="mb-3 col-md-12">
                                        <input name="full_name" type="text" class="form-control" id="formInput1" placeholder="Name">
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <input name="email" type="email" class="form-control" id="formInput1" placeholder="E-Mail">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <input name="phone_number" type="tel" class="form-control" id="formInput1" placeholder="Telefon">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="formFileSm" class="form-label">Bild hochladen</label>
                                        <input class="form-control form-control-sm" name="image" id="formFileSm" type="file">
                                    </div>
                                </div>
                                <br>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input name="privacy_policy" class="form-check-input" type="checkbox" id="flexCheckDefault">
                                        <label class="form-check-label fs-09" for="flexCheckDefault">
                                            Ich habe die <a href="#" class="text-primary">Datenschutzerklärung</a> zur Kenntnis genommen
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn mainBtn w-100">Senden</button>
                                </div>
                            </form>
                            <div class="col-12">
                                <small class="text-warning d-none" id="contact-loading">Bilder werden geladen...</small>
                                <p class="mb-2 home-hero-text" style="color: limegreen" id="contact-message"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="contact-info-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d607.2344784813306!2d13.399632603227479!3d52.49836343792366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x72801b4fd0757151!2zNTLCsDI5JzU0LjciTiAxM8KwMjQnMDAuNiJF!5e0!3m2!1sde!2sde!4v1653050889078!5m2!1sde!2sde" width="100%" height="700" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection