@extends('front.layout.master')

@section('content')
    <section class="about-us-hero">
        <img src="{{ asset('assets/img/about-us/about_us_header.png') }}" alt="" class="w-100">
    </section>

    <section class="about-us-info position-relative pt-5">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col-lg-3 ps-xxl-5">
                    <div class="info-nav">
                        <h3 class="pb-4">Institutionell</h3>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="text-capitalize nav-link {{ $tab_panel == null ? 'active' : '' }}" id="v-pills-uber-unsss-tab" data-bs-toggle="pill" data-bs-target="#v-pills-uber-unsss" type="button" role="tab" charset="UTF-8">Über uns</a>
                            <a class="text-capitalize nav-link {{ $tab_panel == 'datenschutzerklärung' ? 'active' : '' }}" id="#v-pills-datenschutzerklärung-tab" data-bs-toggle="pill" data-bs-target="#v-pills-datenschutzerklärung" type="button" role="tab" charset="UTF-8">Datenschutzerklärung</a>
                            <a class="text-capitalize nav-link {{ $tab_panel == 'impressum' ? 'active' : '' }}" id="#v-pills-impressum-tab" data-bs-toggle="pill" data-bs-target="#v-pills-impressum" type="button" role="tab" charset="UTF-8">Impressum</a>
                            <a class="text-capitalize nav-link {{ $tab_panel == 'cookies' ? 'active' : '' }}" id="#v-pills-cookies-tab" data-bs-toggle="pill" data-bs-target="#v-pills-cookies" type="button" role="tab" charset="UTF-8">Cookies</a>
                            <a class="text-capitalize nav-link {{ $tab_panel == 'agb' ? 'active' : '' }}" id="#v-pills-agb-tab" data-bs-toggle="pill" data-bs-target="#v-pills-agb" type="button" role="tab" charset="UTF-8">AGB</a>
                            @foreach($section1['about-data'] as $key => $item)
                                <a class="text-capitalize nav-link" id="v-pills-{{ $key }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $key }}" type="button" role="tab" charset="UTF-8">{{ $item['title'] }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 py-4">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade {{ $tab_panel == null ? 'show active' : '' }}" id="v-pills-uber-unsss" role="tabpanel">
                            <span>Über uns</span>
                            <h1 class="pb-sm-3">Über uns</h1>
                            @if($section2)
                                <section class="about-us-brothers">
                                    <div class="container-fluid gx-0">
                                        <div class="row justify-content-between align-items-start">
                                            <div class="col-lg-6">
                                                <div class="img ">
                                                    <img src="{{ $section2['image']['url'] }}" alt="{{ $section2['image']['name'] }}">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 px-5">
                                                <div class="text-title pb-3 pt-0">
                                                    <span>{{ $section2['top_title'] }}</span>
                                                    <h1>{{ $section2['title'] }}</h1>
                                                </div>
                                                <p>{!! $section2['description'] !!}</p>

                                                <img src="{{ asset('assets/img/about-us/about_us_imza.png') }}" alt="">
{{--                                                <p class="mb-0 pb-0 pt-4  ">{{ $section2['founder_name'] }}</p>--}}
{{--                                                <span class="fs-08 fw-light">{{ $section2['founder_title'] }}</span>--}}

                                                <p class="mt-0 p-0 fw-bold pt-4">
                                                    {{ $section2['founder_name'] }}
                                                    <br>
                                                    <small class="fw-lighter">
                                                        {{ $section2['founder_title'] }}
                                                    </small>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif
                        </div>
                        <div class="tab-pane fade {{ $tab_panel == 'datenschutzerklärung' ? 'show active' : '' }}" id="v-pills-datenschutzerklärung" role="tabpanel">
                            <span>Datenschutzerklärung</span>
                            <h1 class="pb-sm-3">Datenschutzerklärung</h1>

                            <div class="">
                                <p><strong>Allgemeines</strong></p>
                                <p><br></p>
                                <p>Ihre personenbezogenen Daten im Sinne von Art. 4 Nr. 1 DSGVO (z.B. Anrede, Name, Anschrift,
                                    E-Mail-Adresse, Zahlungsinformationen) werden von uns nur gem&auml;&szlig; den Bestimmungen
                                    des deutschen Datenschutzrechts und unter Ber&uuml;cksichtigung der europ&auml;ischen
                                    Datenschutzgrundverordnung (DSGVO) verarbeitet. Die nachfolgenden Vorschriften informieren
                                    Sie &uuml;ber Art, Umfang und Zweck der Erhebung, Verarbeitung und Nutzung personenbezogener
                                    Daten.</p>
                                <p>Die Verarbeitung im Sinne von Art. 4 Nr. 2 DSGVO von personenbezogenen Daten ist
                                    gem&auml;&szlig; Art. 6 DSGVO rechtm&auml;&szlig;ig, wenn eine der folgenden Voraussetzungen
                                    vorliegt:</p>
                                <ul>
                                    <li>
                                        <p>Die betroffene Person hat ihre Einwilligung zu der Verarbeitung der sie betreffenden
                                            personenbezogenen Daten f&uuml;r einen oder mehrere bestimmte Zwecke gegeben;</p>
                                    </li>
                                    <li>
                                        <p>die Verarbeitung ist f&uuml;r die Erf&uuml;llung eines Vertrags, dessen
                                            Vertragspartei die betroffene Person ist, oder zur Durchf&uuml;hrung
                                            vorvertraglicher Ma&szlig;nahmen erforderlich, die auf Anfrage der betroffenen
                                            Person erfolgen;</p>
                                    </li>
                                    <li>
                                        <p>die Verarbeitung ist zur Erf&uuml;llung einer rechtlichen Verpflichtung erforderlich,
                                            der der Verantwortliche unterliegt;</p>
                                    </li>
                                    <li>
                                        <p>die Verarbeitung ist erforderlich, um lebenswichtige Interessen der betroffenen
                                            Person oder einer anderen nat&uuml;rlichen Person zu sch&uuml;tzen;</p>
                                    </li>
                                    <li>
                                        <p>die Verarbeitung ist f&uuml;r die Wahrnehmung einer Aufgabe erforderlich, die im
                                            &ouml;ffentlichen Interesse liegt oder in Aus&uuml;bung &ouml;ffentlicher Gewalt
                                            erfolgt, die dem Verantwortlichen &uuml;bertragen wurde;</p>
                                    </li>
                                    <li>
                                        <p>die Verarbeitung ist zur Wahrung der berechtigten Interessen des Verantwortlichen
                                            oder eines Dritten erforderlich, sofern nicht die Interessen oder Grundrechte und
                                            Grundfreiheiten der betroffenen Person, die den Schutz personenbezogener Daten
                                            erfordern, &uuml;berwiegen, insbesondere dann, wenn es sich bei der betroffenen
                                            Person um ein Kind handelt.</p>
                                    </li>
                                </ul>
                                <p>Die Verarbeitung besonderer personenbezogenen Daten (z.B. Gesundheitsdaten) im Sinne von Art.
                                    9 Abs. 1 DSGVO ist insbesondere gem&auml;&szlig; Art. 9 Abs. 2 DSGVO rechtm&auml;&szlig;ig,
                                    wenn eine der folgenden Voraussetzungen vorliegt:</p>
                                <ul>
                                    <li>
                                        <p>Es liegt eine ausdr&uuml;ckliche Einwilligung der Person vor;</p>
                                    </li>
                                    <li>
                                        <p>die Verarbeitung ist zur Geltendmachung, Aus&uuml;bung oder Verteidigung von
                                            Rechtsanspr&uuml;chen oder bei Handlungen der Gerichte im Rahmen ihrer justiziellen
                                            T&auml;tigkeit erforderlich.</p>
                                    </li>
                                </ul>
                                <p>Eine automatische Entscheidungsfindung oder ein Profiling bez&uuml;glich personenbezogener
                                    Daten im Sinne von Art. 22 DSGVO findet nicht statt.</p>
                                <p>Der Betreiber stellt die Sicherheit der Daten gem&auml;&szlig; Art. 32 DSGVO unter
                                    Ber&uuml;cksichtigung des Proportionalit&auml;tsgrundsatzes durch geeignete technische
                                    Ma&szlig;nahmen sicher. Sollte es wider Erwarten zu einer Verletzung des Datenschutzes
                                    kommen, wird die zust&auml;ndige Aufsichtsbeh&ouml;rde gem&auml;&szlig; Art. 33 DSGVO, sowie
                                    die betroffene Person gem&auml;&szlig; Art. 34 DSGVO benachrichtigt.</p>
                                <p><img align="bottom"></p>
                                <p><strong>Geltungsbereich</strong></p>
                                <p>Diese Datenschutzerkl&auml;rung bezieht sich nur auf unsere Webseiten. Falls Sie &uuml;ber
                                    Links auf unseren Seiten auf andere Seiten weitergeleitet werden, informieren Sie sich bitte
                                    dort &uuml;ber den jeweiligen Umgang mit Ihren Daten.</p>
                                <p><img align="bottom"></p>
                                <p><strong>Cookies</strong></p>
                                <p>Diese Seite speichert Cookies, um ihre Besucher wieder zu erkennen. Es erfolgt keine
                                    Weitergabe der aufgrund von Cookies erlangten Daten an Dritte. Sofern Sie die Speicherung
                                    von Cookies dennoch unterbinden m&ouml;chten, haben Sie die M&ouml;glichkeit dies in den
                                    Einstellungen Ihres Browsers zu deaktivieren.</p>
                                <p><img align="bottom"></p>
                                <p><strong>Google Webfonts</strong></p>
                                <p>Auf diesen Internetseiten werden externe Schriften, Google Fonts verwendet. Google Fonts ist
                                    ein Dienst der Google Inc. (&bdquo;Google&ldquo;). Die Einbindung dieser Web Fonts erfolgt
                                    durch einen Serveraufruf, in der Regel ein Server von Google in den USA. Hierdurch wird an
                                    den Server &uuml;bermittelt, welche unserer Internetseiten Sie besucht haben. Auch wird die
                                    IP-Adresse des Browsers des Endger&auml;tes des Besuchers dieser Internetseiten von Google
                                    gespeichert.</p>
                                <p>N&auml;here Informationen finden Sie in den Datenschutzhinweisen von Google, die Sie hier
                                    abrufen k&ouml;nnen:</p>
                                <p><a
                                            href="https://www.google.com/fonts#AboutPlace:about"><u><strong>https://www.google.com/fonts#AboutPlace:about</strong></u></a><br><a
                                            href="https://www.google.com/policies/privacy/"><u><strong>https://www.google.com/policies/privacy/</strong></u></a>
                                </p>
                                <p><img align="bottom"></p>
                                <p><strong>Google Analytics</strong></p>
                                <p>Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc.
                                    (&ldquo;Google&rdquo;). Google Analytics verwendet sog. &ldquo;Cookies&rdquo;, Textdateien,
                                    die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website
                                    durch Sie erm&ouml;glichen. Die durch das Cookie erzeugten Informationen &uuml;ber Ihre
                                    Benutzung dieser Website werden in der Regel an einen Server von Google in den USA
                                    &uuml;bertragen und dort gespeichert. Im Falle der Aktivierung der IP-Anonymisierung auf
                                    dieser Webseite wird Ihre IP-Adresse von Google jedoch innerhalb von Mitgliedstaaten der
                                    Europ&auml;ischen Union oder in anderen Vertragsstaaten des Abkommens &uuml;ber den
                                    Europ&auml;ischen Wirtschaftsraum zuvor gek&uuml;rzt. Nur in Ausnahmef&auml;llen wird die
                                    volle IP-Adresse an einen Server von Google in den USA &uuml;bertragen und dort
                                    gek&uuml;rzt.</p>
                                <p>Im Auftrag des Betreibers dieser Website wird Google diese Informationen benutzen, um Ihre
                                    Nutzung der Website auszuwerten, um Reports &uuml;ber die Websiteaktivit&auml;ten
                                    zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene
                                    Dienstleistungen gegen&uuml;ber dem Websitebetreiber zu erbringen. Die im Rahmen von Google
                                    Analytics von Ihrem Browser &uuml;bermittelte IP-Adresse wird nicht mit anderen Daten von
                                    Google zusammengef&uuml;hrt.</p>
                                <p>Sie k&ouml;nnen die Speicherung der Cookies durch eine entsprechende Einstellung Ihrer
                                    Browser-Software verhindern; Es wird jedoch darauf hingewiesen, dass Sie in diesem Fall
                                    gegebenenfalls nicht s&auml;mtliche Funktionen dieser Website vollumf&auml;nglich werden
                                    nutzen k&ouml;nnen.</p>
                                <p>Sie k&ouml;nnen dar&uuml;ber hinaus die Erfassung der durch das Cookie erzeugten und auf Ihre
                                    Nutzung der Website bezogenen Daten (inkl. Ihrer IP-Adresse) an Google sowie die
                                    Verarbeitung dieser Daten durch Google verhindern, indem Sie das unter dem folgenden Link
                                    verf&uuml;gbare Browser-Plugin herunterladen und installieren:</p>
                                <p><a
                                            href="http://tools.google.com/dlpage/gaoptout?hl=de"><u><strong>http://tools.google.com/dlpage/gaoptout?hl=de</strong></u></a>
                                </p>
                                <p>Die Anonymisierungsfunktion von Google Analytics wird benutzt. Mit Google Inc. wurde ein
                                    Vertrag &uuml;ber die Auftragsverarbeitung geschlossen.</p>
                                <p><img align="bottom"></p>
                                <p><strong>Google Tag Manager / Google Ads</strong></p>
                                <p>Google Tag Manager ist eine L&ouml;sung, mit der Vermarkter Website-Tags &uuml;ber eine
                                    Oberfl&auml;che verwalten k&ouml;nnen. Das Tool Tag Manager selbst (das die Tags
                                    implementiert) ist eine Cookie lose Domain und erfasst keine personenbezogenen Daten. Das
                                    Tool sorgt f&uuml;r die Ausl&ouml;sung anderer Tags, die ihrerseits unter Umst&auml;nden
                                    Daten erfassen. Google Tag Manager greift nicht auf diese Daten zu. Wenn auf Domain- oder
                                    Cookie-Ebene eine Deaktivierung vorgenommen wurde, bleibt diese f&uuml;r alle Tracking-Tags
                                    bestehen, die mit Google Tag Manager implementiert werden.</p>
                                <p>F&uuml;r diese Daten gelten die abweichenden Datenschutzbestimmungen des Unternehmens Google.
                                    Weitere Informationen zu den Datenschutzrichtlinien von Google finden Sie unter:</p>
                                <p><a
                                            href="https://www.google.com/intl/de/policies/privacy/"><u><strong>https://www.google.com/intl/de/policies/privacy/</strong></u></a>
                                </p>
                                <p>Mit Google Inc. wurde ein Vertrag &uuml;ber die Auftragsverarbeitung geschlossen.</p>
                                <p><img align="bottom"></p>
                                <p><strong>Paypal</strong></p>
                                <p>Bei Zahlung via PayPal, Kreditkarte via PayPal, Lastschrift via PayPal oder &bdquo;Kauf auf
                                    Rechnung&ldquo; sowie Ratenzahlung &uuml;ber Paypal geben wir Ihre Zahlungsdaten im Rahmen
                                    der Zahlungsabwicklung an die PayPal (Europe) S.&agrave; r.l. et Cie, S.C.A., 22-24
                                    Boulevard Royal, L-2449 Luxembourg (nachfolgend &bdquo;PayPal&ldquo;), weiter. PayPal
                                    beh&auml;lt sich f&uuml;r die Zahlungsmethoden Kreditkarte via PayPal, Lastschrift via
                                    PayPal oder &bdquo;Kauf auf Rechnung&ldquo; via PayPal sowie der Ratenzahlung &uuml;ber
                                    Paypal die Durchf&uuml;hrung einer Bonit&auml;tsauskunft vor. Das Ergebnis der
                                    Bonit&auml;tspr&uuml;fung in Bezug auf die statistische Zahlungsausfallwahrscheinlichkeit
                                    verwendet PayPal zum Zwecke der Entscheidung &uuml;ber die Bereitstellung der jeweiligen
                                    Zahlungsmethode. Die Bonit&auml;tsauskunft kann Wahrscheinlichkeitswerte enthalten (sog.
                                    Score-Werte). Soweit Score-Werte in das Ergebnis der Bonit&auml;tsauskunft einflie&szlig;en,
                                    haben diese ihre Grundlage in einem wissenschaftlich anerkannten mathematisch-statistischen
                                    Verfahren. In die Berechnung der Score-Werte flie&szlig;en unter anderem Anschriftendaten
                                    ein.</p>
                                <p>Weitere datenschutzrechtliche Informationen, unter anderem zu den verwendeten Auskunfteien,
                                    entnehmen Sie bitte der Datenschutzerkl&auml;rung von PayPal:</p>
                                <p><a
                                            href="https://www.paypal.com/de/webapps/mpp/ua/privacy-full"><u><strong>https://www.paypal.com/de/webapps/mpp/ua/privacy-full</strong></u></a>
                                </p>
                                <p><img align="bottom"></p>
                                <p><strong>Sicherheit Ihrer Daten / SSL-Verschl&uuml;sselungen</strong></p>
                                <p>Im Einklang mit der gesetzlichen Regelung nach &sect; 13 Abs. 7 TMG verwendet diese Seite
                                    eine SSL-Verschl&uuml;sselung, zu erkennen an einem Schloss-Symbol in der Adressleiste Ihres
                                    Browsers. &Uuml;bermittelte Daten k&ouml;nnen bei aktivierter SSL-Verschl&uuml;sselung nicht
                                    von Dritten mitgelesen werden.</p>
                                <p>In der Regel handelt es sich dabei um eine 256 Bit Verschl&uuml;sselung. Falls Ihr Browser
                                    keine 256-Bit Verschl&uuml;sselung unterst&uuml;tzt, greifen wir stattdessen auf 128-Bit v3
                                    Technologie zur&uuml;ck. Ob eine einzelne Seite unseres Internetauftrittes
                                    verschl&uuml;sselt &uuml;bertragen wird, erkennen Sie an der geschlossenen Darstellung des
                                    Sch&uuml;ssel- beziehungsweise Schloss-Symbols in der unteren Statusleiste Ihres Browsers.
                                </p>
                                <p>Wir bedienen uns im &Uuml;brigen geeigneter technischer und organisatorischer
                                    Sicherheitsma&szlig;nahmen (TOM), um Ihre Daten gegen zuf&auml;llige oder vors&auml;tzliche
                                    Manipulationen, teilweisen oder vollst&auml;ndigen Verlust, Zerst&ouml;rung oder gegen den
                                    unbefugten Zugriff Dritter zu sch&uuml;tzen. Unsere Sicherheitsma&szlig;nahmen werden
                                    entsprechend der technologischen Entwicklung fortlaufend verbessert.</p>
                                <p><img align="bottom"></p>
                                <p><strong>Betroffenenrechte</strong></p>
                                <p>Sie k&ouml;nnen jederzeit und unentgeltlich Auskunft &uuml;ber die zu Ihrer Person
                                    gespeicherten personenbezogenen Daten verlangen. Ihre Rechte umfassen dabei auch eine
                                    Best&auml;tigung, Berichtigung, Beschr&auml;nkung, Sperrung und L&ouml;schung von solchen
                                    Daten und die Zurverf&uuml;gungstellung einer Kopie der Daten, in einer zur &Uuml;bertragung
                                    geeigneten Form, sowie den Widerruf einer erteilten Einwilligung und den Widerspruch.
                                    Gesetzliche Aufbewahrungspflichten bleiben hiervon unber&uuml;hrt.</p>
                                <p>Ihre Rechte ergeben sich dabei im Einzelnen insbesondere aus den folgenden Normen der DSGVO:
                                </p>
                                <ul>
                                    <li>
                                        <p>Artikel 7 Abs. 3 &ndash; Recht auf Widerruf einer datenschutzrechtlichen Einwilligung
                                        </p>
                                    </li>
                                    <li>
                                        <p>Artikel 12 &ndash; Transparente Information, Kommunikation und Modalit&auml;ten
                                            f&uuml;r die Aus&uuml;bung der Rechte der betroffenen Person</p>
                                    </li>
                                    <li>
                                        <p>Artikel 13 &ndash; Informationspflicht bei Erhebung von personenbezogenen Daten bei
                                            der betroffenen Person</p>
                                    </li>
                                    <li>
                                        <p>Artikel 14 &ndash; Informationspflicht, wenn die personenbezogenen Daten nicht bei
                                            der betroffenen Person erhoben wurden</p>
                                    </li>
                                    <li>
                                        <p>Artikel 15 &ndash; Auskunftsrecht der betroffenen Person, Recht auf Best&auml;tigung
                                            und Zurverf&uuml;gungstellung einer Kopie der personenbezogenen Daten</p>
                                    </li>
                                    <li>
                                        <p>Artikel 16 &ndash; Recht auf Berichtigung</p>
                                    </li>
                                    <li>
                                        <p>Artikel 17 &ndash; Recht auf L&ouml;schung (&bdquo;Recht auf Vergessenwerden&ldquo;)
                                        </p>
                                    </li>
                                    <li>
                                        <p>Artikel 18 &ndash; Recht auf Einschr&auml;nkung der Verarbeitung</p>
                                    </li>
                                    <li>
                                        <p>Artikel 19 &ndash; Mitteilungspflicht im Zusammenhang mit der Berichtigung oder
                                            L&ouml;schung personenbezogener Daten oder der Einschr&auml;nkung der Verarbeitung
                                        </p>
                                    </li>
                                    <li>
                                        <p>Artikel 20 &ndash; Recht auf Daten&uuml;bertragbarkeit</p>
                                    </li>
                                    <li>
                                        <p>Artikel 21 &ndash; Widerspruchsrecht</p>
                                    </li>
                                    <li>
                                        <p>Artikel 22 &ndash; Recht, nicht einer ausschlie&szlig;lich auf einer automatisierten
                                            Verarbeitung &ndash; einschlie&szlig;lich Profiling &ndash; beruhenden Entscheidung
                                            unterworfen zu werden</p>
                                    </li>
                                    <li>
                                        <p>Artikel 77 &ndash; Recht auf Beschwerde bei einer Aufsichtsbeh&ouml;rde</p>
                                    </li>
                                </ul>
                                <p>Zur Aus&uuml;bung Ihrer Rechte (mit Ausnahme von Art. 77 DSGVO) wenden Sie sich bitte an die
                                    unter dem Punkt &bdquo;Verantwortlicher im Sinne der DSGVO&ldquo; (z.B. per E-Mail an:
                                    info@fivestar-marketing.net) genannte Stelle.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ $tab_panel == 'impressum' ? 'show active' : '' }}" id="v-pills-impressum" role="tabpanel">
                            <span>Impressum</span>
                            <h1 class="pb-sm-3">Impressum</h1>

                            <div class="impressum-inner">
                                <div style=""><p style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;;"><span style="font-weight:bold;">(Angaben gemäß § 5 TMG)</span></p><p style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;;">Auf dieser Seite erfahren Sie alles Notwendige zu der Internetdomain von Kristall Kultur. Außerdem finden Sie hier eine ausführliche Rechtsbelehrung zur Nutzung der Website, insbesondere zu von dieser Website aus verlinkten Websites.</p><p style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;;"><b>Verantwortlich für alle Inhalte der Website ist:</b><br><span style="font-size: 1rem;">Kristall Kultur<br></span><span style="font-size: 1rem;">Mustafa Tahta<br></span><span style="font-size: 1rem;">Gitschiner Straße 96<br></span><span style="font-size: 1rem;">10969 Berlin<br></span><span style="font-size: 1rem;">Deutschland</span></p><p style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;;">Umsatzsteuer-Identifikationsnummer (USt-IdNr.): DE285991813</p><p style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;;"><b>Kontakt<br></b><span style="font-size: 1rem;">Telefon:&nbsp; +491775652848<br></span><span style="font-size: 1rem;">E-Mail:&nbsp; &nbsp;info@kristallkultur.com</span></p><p style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;;">Hier kommen Sie zur&nbsp;<span style="color: rgb(0, 0, 255); text-decoration-line: underline;">Datenschutzerklärung</span>.</p><p style="font-family: &quot;Times New Roman&quot;;"><b style="color: rgb(0, 0, 0);">Streitschlichtung<br></b><span style="color: rgb(0, 0, 0); font-size: 1rem;">Die Europäische Kommission stellt eine Plattform zur Online-Streitbeilegung (OS) bereit:</span><a href="https://ec.europa.eu/consumers/odr" target="_blank">https://ec.europa.eu/consumers/odr</a><a href="https://ec.europa.eu/consumers/odr" style="color: rgb(109, 109, 109); background-color: rgb(255, 255, 255); font-size: 1rem; text-decoration-line: underline;"><span style="color: rgb(0, 0, 255);"></span></a><font color="#0000ff"><br></font><span style="color: rgb(0, 0, 0); font-size: 1rem;">Meine E-Mail-Adresse finden Sie oben im Impressum.Ich bin nicht bereit oder verpflichtet, an Streitbeilegungsverfahren vor einerVerbraucherschlichtungsstelle teilzunehmen.</span></p><p style="font-family: &quot;Times New Roman&quot;;"><font color="#000000"><b>Haftungsausschluss Disclaimer<br></b></font><a href="http://www.disclaimer.de/disclaimer.htm" style="color: rgb(109, 109, 109); background-color: rgb(255, 255, 255); font-size: 1rem; text-decoration-line: underline;"><span style="color: rgb(0, 0, 255);">bitte hier lesen.</span></a></p><p style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;; font-weight: bold;">Website Entwud unf Grafik</p><p style="color: rgb(0, 0, 0); font-family: &quot;Times New Roman&quot;;"><span style="font-weight:bold;">Webseite-Texte<br></span><a href="https://texthaus-berlin.de" style="color: rgb(109, 109, 109); text-decoration-line: underline;"><span style="color: rgb(0, 0, 255);">Texthaus Berlin</span></a></p><p style="color: rgb(0, 0, 0); font-family: &quot;Segoe UI&quot;;"></p><p style="color: rgb(0, 0, 0); font-family: &quot;Segoe UI&quot;;"><span style="font-family:Times New Roman;font-weight:bold;font-size:16;">Fotonachweise</span></p></div>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ $tab_panel == 'cookies' ? 'show active' : '' }}" id="v-pills-cookies" role="tabpanel">
                            <span>Cookies</span>
                            <h1 class="pb-sm-3">Cookies</h1>

                            <div>
                                <h1>Cookie Policy for Kron Leuchter</h1>
                                <p>This is the Cookie Policy for Kron Leuchter, accessible from http://kron-leuchter.com</p>
                                <p><strong>What Are Cookies</strong></p>
                                <p>As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. This page describes what information they gather, how we use it and why we sometimes need to store these cookies. We will also share how you can prevent these cookies from being stored however this may downgrade or 'break' certain elements of the sites functionality.</p>
                                <p><strong>How We Use Cookies</strong></p>
                                <p>We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site. It is recommended that you leave on all cookies if you are not sure whether you need them or not in case they are used to provide a service that you use.</p>
                                <p><strong>Disabling Cookies</strong></p>
                                <p>You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in also disabling certain functionality and features of the this site. Therefore it is recommended that you do not disable cookies. This Cookies Policy was created with the help of the <a href="https://www.cookiepolicygenerator.com/cookie-policy-generator/">Cookies Policy Generator</a>.</p>
                                <p><strong>The Cookies We Set</strong></p>
                                <ul>
                                    <li>
                                        <p>Orders processing related cookies</p>
                                        <p>This site offers e-commerce or payment facilities and some cookies are essential to ensure that your order is remembered between pages so that we can process it properly.</p>
                                    </li>


                                    <li>
                                        <p>Forms related cookies</p>
                                        <p>When you submit data to through a form such as those found on contact pages or comment forms cookies may be set to remember your user details for future correspondence.</p>
                                    </li>

                                    <li>
                                        <p>Site preferences cookies</p>
                                        <p>In order to provide you with a great experience on this site we provide the functionality to set your preferences for how this site runs when you use it. In order to remember your preferences we need to set cookies so that this information can be called whenever you interact with a page is affected by your preferences.</p>
                                    </li>

                                </ul>

                                <p><strong>Third Party Cookies</strong></p>

                                <p>In some special cases we also use cookies provided by trusted third parties. The following section details which third party cookies you might encounter through this site.</p>

                                <ul>

                                    <li>
                                        <p>This site uses Google Analytics which is one of the most widespread and trusted analytics solution on the web for helping us to understand how you use the site and ways that we can improve your experience. These cookies may track things such as how long you spend on the site and the pages that you visit so we can continue to produce engaging content.</p>
                                        <p>For more information on Google Analytics cookies, see the official Google Analytics page.</p>
                                    </li>

                                    <li>
                                        <p>Third party analytics are used to track and measure usage of this site so that we can continue to produce engaging content. These cookies may track things such as how long you spend on the site or pages you visit which helps us to understand how we can improve the site for you.</p>
                                    </li>

                                    <li>
                                        <p>From time to time we test new features and make subtle changes to the way that the site is delivered. When we are still testing new features these cookies may be used to ensure that you receive a consistent experience whilst on the site whilst ensuring we understand which optimisations our users appreciate the most.</p>
                                    </li>
                                </ul>
                                <p><strong>More Information</strong></p>
                                <p>Hopefully that has clarified things for you and as was previously mentioned if there is something that you aren't sure whether you need or not it's usually safer to leave cookies enabled in case it does interact with one of the features you use on our site.</p>
                                <p>For more general information on cookies, please read <a href="https://www.cookiepolicygenerator.com/sample-cookies-policy/">the Cookies Policy article</a>.</p>
                                <p>However if you are still looking for more information then you can contact us through one of our preferred contact methods:</p>
                                <ul>
                                    <li>By visiting this link: http://kron-leuchter.com/contact</li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane fade {{ $tab_panel == 'agb' ? 'show active' : '' }}" id="v-pills-agb" role="tabpanel">
                            <span>AGB</span>
                            <h1 class="pb-sm-3">AGB</h1>

                            <div>
                                <h3>1. ALLGEMEINES</h3>
                                <p>Die Kron-Leuchter GmbH betreibt im Internet u.a. unter der Domain &bdquo;Kron-Leuchter.com&ldquo;
                                    eine &uuml;ber das Internet nutzbare Softwareanwendung (im Folgenden: Dienst), die
                                    Unternehmer bei ihren T&auml;tigkeiten auf Handelsplattformen unterst&uuml;tzt. Anbieter des
                                    Dienstes ist die Kron-Leuchter GmbH, Wicker-Frosch-Straße 18,
                                    60486 Frankfurt am Main (im Folgenden:
                                    Kron-Leuchter GmbH). Diese Gesch&auml;ftsbedingungen gelten f&uuml;r alle, auch zuk&uuml;nftige
                                    Gesch&auml;ftsbeziehungen, zwischen dem Nutzer und Kron-Leuchter GmbH . Abweichende,
                                    entgegenstehende oder erg&auml;nzende AGB des Nutzers (auch z.B. Bezugsbedingungen,
                                    Einkaufsbedingungen) werden nicht Vertragsbestandteil, es sei denn, die Geltung ist bei
                                    Vertragsschluss ausdr&uuml;cklich vereinbart. Jedem formularm&auml;&szlig;igen Hinweis auf
                                    Gesch&auml;ftsbedingungen des Nutzers wird ausdr&uuml;cklich widersprochen.</p>
                                <h3>2. VERTRAGSGEGENSTAND</h3>
                                <p>Gegenstand des Nutzungsvertrages ist die Bereitstellung des Dienstes zur Nutzung der
                                    Funktionalit&auml;ten an den Nutzer. Der jeweilige Leistungsumfang, n&auml;mlich
                                    insbesondere die technische Funktionalit&auml;t und Art und Umfang der angebotenen Services
                                    ist abh&auml;ngig von dem im Rahmen der Registrierung gew&auml;hlten Tarif. Der jeweilige
                                    Funktionsumfang eines Tarifes ergibt sich aus der Leistungsbeschreibung. Daneben beh&auml;lt
                                    sich Kron-Leuchter GmbH die M&ouml;glichkeit vor, Zusatzleistungen anzubieten, die &uuml;ber
                                    den gew&auml;hlten Tarif hinausgehen. Die Kosten und der Umfang der jeweiligen
                                    Zusatzleistung ergeben sich ebenfalls aus der Leistungsbeschreibung und der jeweils
                                    g&uuml;ltigen Preisliste F&uuml;r die Nutzung des Dienstes muss der Nutzer &uuml;ber einen
                                    Internetanschluss, ein internetf&auml;higes Endger&auml;t und einen aktuellen
                                    Internetbrowser verf&uuml;gen, deren Kosten er selbst zu tragen hat. Kein Vertragsgegenstand
                                    ist die Erzielung eines bestimmten Verkaufserfolges auf Handelsplattformen. Kron-Leuchter GmbH
                                    bietet lediglich die Nutzungsm&ouml;glichkeit f&uuml;r bestimmte Dienste, deren
                                    erfolgreicher Einsatz ist ausschlie&szlig;lich Aufgabe des Nutzers.</p>
                                <h3>3. VERTRAGSSCHLUSS</h3>
                                <p>Die Nutzung des Dienstes ist nur im Rahmen eines Nutzungsvertrages m&ouml;glich. Der
                                    Abschluss eines Vertrags &uuml;ber die Nutzung des Dienstes ist nur Unternehmern,
                                    juristischen Personen des &ouml;ffentlichen Rechts oder &ouml;ffentlich-rechtlichen
                                    Sonderverm&ouml;gen m&ouml;glich. Der Nutzer ist verpflichtet, bei Abschluss eines
                                    Nutzungsvertrages nur wahrheitsgem&auml;&szlig;e Angaben zu seiner Person und dem
                                    Unternehmen zu machen und seine Daten stets aktuell zu halten. Kron-Leuchter GmbH bietet den
                                    Abschluss kostenpflichtigen Nutzungsvertr&auml;gen an. Mit Ausf&uuml;llen und Absenden des
                                    entsprechenden Formulars erkl&auml;rt der Nutzer, einen Vertrag mit Kron-Leuchter GmbH
                                    &uuml;ber die Nutzung der Dienste schlie&szlig;en zu wollen. Der Nutzer hat die
                                    M&ouml;glichkeit, vor Absenden des Formulars seine Angaben zu seiner Person bzw. seinem
                                    Unternehmen zu pr&uuml;fen und ggf. durch &Auml;ndern der entsprechenden Felder zu
                                    korrigieren. Ferner kann er die von ihm ausgew&auml;hlten Leistungen pr&uuml;fen und durch
                                    Bet&auml;tigen der entsprechenden Auswahlboxen &Auml;ndern. Durch Bet&auml;tigen der
                                    entsprechenden Schaltfl&auml;che gibt der Nutzer ein verbindliches Angebot auf Abschluss
                                    eines Nutzungsvertrages ab. Kron-Leuchter GmbH nimmt das Angebot durch Zusendung einer
                                    Bestellbest&auml;tigung, in der auch die Zugangsdaten zu den Diensten enthalten sind an.
                                    F&uuml;r den Abschluss des Vertrages steht sowohl die deutsche als auch je nach genutzter
                                    Plattform die englische Sprache zur Verf&uuml;gung. Der Vertragstext wird von Kron-Leuchter
                                    GmbH gespeichert, ist dem Kunden jedoch nicht zug&auml;nglich.</p>
                                <h3>4. BEREITSTELLUNG DES DIENSTES</h3>
                                <p>Der Dienst wird dem Nutzer mit Freischaltung durch Kron-Leuchter GmbH bereitgestellt.
                                    &Uuml;bergabepunkt f&uuml;r die Bereitstellung des Dienstes ist der Router Ausgang des
                                    Rechenzentrums von Kron-Leuchter GmbH. Kron-Leuchter GmbH schuldet eine Verf&uuml;gbarkeit des
                                    Dienstes am &Uuml;bergabepunkt von 97% im Jahresmittel.</p>
                                <h3>5. NUTZUNGSBEFUGNIS, RECHTE</h3>
                                <p>Kron-Leuchter GmbH &auml;umt dem Nutzer das einfache, nicht unter lizenzierbare und nicht
                                    &uuml;bertragbare Recht ein, den Dienst w&auml;hrend der Laufzeit des Vertrages f&uuml;r
                                    eigene Unternehmenszwecke zu nutzen. Nicht einger&auml;umte Rechte stehen dem Nutzer nicht
                                    zu. Der Nutzer ist insbesondere nicht berechtigt, Dritten den Dienst zur Nutzung zu
                                    &uuml;berlassen oder mittels des Dienstes Leistungen f&uuml;r Dritte zu erbringen. Hiervon
                                    ausgenommen sind Dienstleiter, die unmittelbar f&uuml;r den Kunden t&auml;tig werden. Sofern
                                    und soweit w&auml;hrend der Laufzeit des Nutzungsvertrages auf dem Server von Kron-Leuchter
                                    GmbH eine Datenbank, Datenbanken oder ein Datenbankwerk oder Datenbankwerke entstehen,
                                    stehen alle Rechte hieran dem Nutzer zu. Der Nutzer bleibt auch nach Vertragsende
                                    Eigent&uuml;mer der Datenbanken bzw. Datenbankwerke.</p>
                                <h3>6. ENTGELT, ZAHLUNG</h3>
                                <p>Soweit die Nutzung des Dienstes kostenpflichtig ist, richten sich die Kosten nach den Angaben
                                    in der jeweiligen Preisliste. Alle Preise gelten zzgl. der gesetzlichen Mehrwertsteuer. Alle
                                    Zahlungen sind entsprechend der jeweiligen Leistungsbeschreibung zu entrichten und
                                    k&ouml;nnen mittels der angebotenen Zahlungsverfahren erbracht werden. Soweit die Parteien
                                    die Zahlungsart &bdquo;Lastschrift&rdquo; vereinbaren, erteilt der Nutzer Kron-Leuchter GmbH
                                    zum Einzug der jeweils f&auml;lligen Forderung, auch f&uuml;r wiederkehrende Zahlungen und
                                    Verbindlichkeiten in wechselnden H&ouml;hen ein SEPA-Basis-Mandat / SEPA-Firmen-Mandat. Die
                                    Frist f&uuml;r die Vorabank&uuml;ndigung (Pre-Notification) wird, soweit zul&auml;ssig, auf
                                    1 Tag verk&uuml;rzt. Der Nutzer sichert zu, f&uuml;r die Deckung des Kontos zu sorgen.
                                    Kosten, die aufgrund von Nichteinl&ouml;sung oder R&uuml;ckbuchung eines Zahlungsauftrags
                                    entstehen, gehen zu Lasten des Kunden, solange die Nichteinl&ouml;sung oder die
                                    R&uuml;ckbuchung nicht durch Kron-Leuchter GmbHverursacht wurde. Zus&auml;tzlich erhebt
                                    Kron-Leuchter GmbH eine Bearbeitungsgeb&uuml;hr in H&ouml;he von 10&euro; netto. Die
                                    Rechnungsstellung durch Kron-Leuchter GmbH erfolgt in elektronischer Form. Eine
                                    &Uuml;bersendung findet per E-Mail statt. Daneben kann Kron-Leuchter GmbH dem Nutzer die
                                    M&ouml;glichkeit einr&auml;umen, Rechnungsdokumente im Nutzerkonto selbst in Dateiform
                                    abzurufen. W&uuml;nscht der Nutzer zus&auml;tzlich einen Versand auf dem Postweg, ist
                                    Kron-Leuchter GmbH berechtigt, hierf&uuml;r einen Pauschalbetrag gem&auml;&szlig; der
                                    Preisliste zu verlangen. Kron-Leuchter GmbH agiert als Vermittlungsplattform zwischen
                                    Unternehmer und Tester. Im Rahmen dieser Funktion verwaltet Kron-Leuchter GmbH das auf der
                                    Plattform aufgeladene Guthaben des Unternehmers, um dieses in Managed Kampagnen an die
                                    Tester auszuzahlen. Auf Kron-Leuchter eingezahltes Guthaben muss durch Dienstleistungen des
                                    Tools (Testerauszahlungen, Kauf von Managed/Fully Managed Zuschl&auml;gen) aufgebraucht
                                    werden. Eine Auszahlung des Kron-Leuchter Guthabens in Bar oder die Transferierung auf ein
                                    Bankkonto ist nicht m&ouml;glich.</p>
                                <h3>7. PFLICHTEN UND OBLIEGENHEITEN DES NUTZERS</h3>
                                <p>Der Nutzer w&auml;hlt zum Zwecke der Nutzung des Dienstes Zugangsdaten. Der Nutzer ist
                                    verpflichtet, diese Zugangsdaten geheim zu halten und Kron-Leuchter GmbH &uuml;ber den Verlust
                                    oder die unbefugte Nutzung der Zugangsdaten durch Dritte unverz&uuml;glich zu unterrichten.
                                    Dem Nutzer ist es nicht gestattet, Zugangsdaten Dritten zur Verf&uuml;gung zu stellen.
                                    Kron-Leuchter GmbH ist berechtigt, Zugangsdaten zu sperren, falls ein Verdacht einer unbefugten
                                    Nutzung oder eines Missbrauchs der Daten vorliegt. Der Nutzer darf den Dienst nur f&uuml;r
                                    eigene unternehmerische Zwecke nutzen. Der Nutzer verpflichtet sich dazu, weder die Dienste
                                    zur Bewerbung von mit Kron-Leuchter GmbH konkurrierenden Angeboten zu nutzen noch Daten bzw.
                                    Kontaktdaten Dritter innerhalb der Dienste zu sammeln und mit diesen Dritten au&szlig;erhalb
                                    der Dienste in Kontakt oder vertragliche Beziehungen zu treten. Soweit der Nutzer
                                    feststellt, dass der Dienst nicht oder nicht ordnungsgem&auml;&szlig; arbeitet, ist er
                                    verpflichtet, Kron-Leuchter GmbH hiervon in Textform unverz&uuml;glich in Kenntnis zu setzen.
                                </p>
                                <h3>8. DATENSCHUTZ</h3>
                                <p>Die Parteien werden die jeweils anwendbaren, insb. die in Deutschland g&uuml;ltigen
                                    datenschutzrechtlichen Bestimmungen beachten. Kron-Leuchter GmbH ist berechtigt, die Daten der
                                    Nutzer in anonymer Form statistisch auszuwerten und f&uuml;r eigene Zwecke, auch f&uuml;r
                                    Werbezwecke zu verwenden. Dies dient insbesondere der Weiterentwicklung der Dienste.</p>
                                <h3>9. HAFTUNG</h3>
                                <p>Kron-Leuchter GmbH haftet dem Nutzer bei Vorsatz oder grober Fahrl&auml;ssigkeit f&uuml;r alle
                                    selbst sowie durch gesetzliche Vertreter oder Erf&uuml;llungsgehilfen verursachten
                                    Sch&auml;den unbeschr&auml;nkt. Bei leichter Fahrl&auml;ssigkeit haftet Kron-Leuchter GmbH im
                                    Fall der Verletzung des Lebens, des K&ouml;rpers oder der Gesundheit unbeschr&auml;nkt. Im
                                    &Uuml;brigen haftet Kron-Leuchter GmbH nur, soweit eine wesentliche Vertragspflicht verletzt
                                    wurde. Wesentliche Vertragspflichten sind solche Pflichten, die f&uuml;r die Erreichung des
                                    Vertragsziels von besonderer Bedeutung sind, ebenso diejenigen Pflichten, die im Fall einer
                                    schuldhaften Verletzung dazu f&uuml;hren k&ouml;nnen, dass die Erreichung des Vertragszwecks
                                    gef&auml;hrdet wird. In diesen F&auml;llen ist die Haftung auf den Ersatz des
                                    vorhersehbaren, typischerweise eintretenden Schadens beschr&auml;nkt. Die
                                    verschuldensunabh&auml;ngige Haftung von Kron-Leuchter GmbH auf Schadensersatz nach &sect;536a
                                    BGB f&uuml;r bei Vertragsschluss vorhandene M&auml;ngel wird ausgeschlossen, die
                                    vorstehenden Abs&auml;tze bleiben unber&uuml;hrt. Die Haftung nach dem Produkthaftungsgesetz
                                    bleibt unber&uuml;hrt.</p>
                                <h3>10. LAUFZEIT, K&Uuml;NDIGUNG</h3>
                                <p>Die Laufzeit des Vertrages &uuml;ber eine kostenpflichtige Nutzung des Dienstes beginnt mit
                                    Freischaltung durch Kron-Leuchter GmbH und l&auml;uft monatsweise auf unbestimmte Zeit.
                                    W&auml;hlt der Nutzer ein abweichendes Zahlungsintervall, so verl&auml;ngert sich die
                                    Vertragslaufzeit auf das gew&auml;hlte Zahlungsintervall. Die Laufzeit eines Vertrages
                                    &uuml;ber eine kostenpflichtige Nutzung des Dienstes verl&auml;ngert sich automatisch um die
                                    jeweilige Vertragslaufzeit, wenn er nicht fristgerecht gek&uuml;ndigt wird.
                                    &Uuml;berschreiten genutzte Services, insbesondere Zusatzleistungen in ihrer Laufzeit die
                                    Laufzeit des Vertrages, so kann der Vertrag nicht vor Ablauf der Laufzeit der
                                    Zusatzleistungen gek&uuml;ndigt werden. Die K&uuml;ndigung, auch die von Kron-Leuchter GmbH,
                                    bedarf zumindest der Textform; hierf&uuml;r gilt zudem eine Frist von zwei Wochen zum
                                    jeweiligen Laufzeitende. Unber&uuml;hrt bleibt die M&ouml;glichkeit zur
                                    au&szlig;erordentlichen K&uuml;ndigung aus wichtigem Grund. Diese K&uuml;ndigung bedarf
                                    ebenfalls der Textform. Stellt der Nutzer die Nutzung des Dienstes vor Ablauf der
                                    K&uuml;ndigungsfrist einseitig ein, so bleibt seine Pflicht zur Entrichtung der
                                    Verg&uuml;tung hiervon unber&uuml;hrt. Ist der Kunde mit der Zahlung der monatlichen Kosten
                                    oder mit sonstigen Zahlungsverpflichtungen nicht nur geringf&uuml;gig im Zahlungsverzug, so
                                    kann Kron-Leuchter GmbH bei Fortdauer der Zahlungsverpflichtung die Nutzungsberechtigung der
                                    Dienste bis zur vollst&auml;ndigen Nacherf&uuml;llung des Zahlungsverzuges entziehen
                                    und/oder die Inanspruchnahme weiterer Leistungen so lange verweigern. Das Recht zur
                                    fristlosen K&uuml;ndigung aus wichtigem Grund bleibt neben dem Recht zum Entzug der
                                    Nutzungsberechtigung unber&uuml;hrt.</p>
                                <h3>11. &Auml;NDERUNGEN DIESER AGB, &Uuml;BERTRAGUNG VON RECHTEN</h3>
                                <p>Kron-Leuchter GmbH hat das Recht, die Bestimmungen bez&uuml;glich der zu erbringenden Leistung
                                    nach billigem Ermessen in Abw&auml;gung der technischen Erfordernisse und Marktgegebenheiten
                                    zu &auml;ndern, soweit dies f&uuml;r den Nutzer zumutbar ist. &Auml;nderungen dieser
                                    Allgemeinen Gesch&auml;ftsbedingungen werden im Dienst ver&ouml;ffentlicht. &Uuml;ber
                                    &Auml;nderungen der AGB, die nicht unter Abs. 1 fallen, wird der Nutzer in Textform
                                    informiert. Die &Auml;nderungen werden wirksam, sofern der Nutzer den jeweiligen
                                    &Auml;nderungen nicht sp&auml;testens 14 Tage nach Zugang der &Auml;nderungsmitteilung in
                                    Textform widerspricht. Auf die Bedeutung seines Schweigens wird der Nutzer zusammen mit der
                                    &Auml;nderungsmitteilung informiert. Widerspricht der Nutzer der &Auml;nderung, ist
                                    Kron-Leuchter GmbH berechtigt, den Vertrag ordentlich zum Laufzeitende zu k&uuml;ndigen. Macht
                                    Kron-Leuchter GmbH von diesem K&uuml;ndigungsrecht keinen Gebrauch, wird der Vertrag zu den bis
                                    dahin geltende Bedingungen fortgesetzt.</p>
                                <h3>12. SCHLUSSBESTIMMUNGEN</h3>
                                <p>Es gilt das Recht der Bundesrepublik Deutschland. Die Bestimmungen des UN-Kaufrechts finden
                                    keine Anwendung. Ist der Nutzer Kaufmann, juristische Person des &ouml;ffentlichen Rechts
                                    oder &ouml;ffentlich-rechtliches Sonderverm&ouml;gen, ist ausschlie&szlig;licher
                                    Gerichtsstand f&uuml;r alle Streitigkeiten aus diesem Vertrag der Gesch&auml;ftssitz von
                                    Kron-Leuchter GmbH. Dasselbe gilt, wenn der Nutzer keinen allgemeinen Gerichtsstand in
                                    Deutschland hat oder Wohnsitz oder gew&ouml;hnlicher Aufenthalt im Zeitpunkt der
                                    Klageerhebung nicht bekannt sind.</p>
                            </div>
                        </div>

                        @foreach($section1['about-data'] as $key => $item)
                        <div class="tab-pane fade show" id="v-pills-{{ $key }}" role="tabpanel">
                            <span>{{ $item['top_title'] }}</span>
                            <h1 class="pb-sm-3">{{ $item['title'] }}</h1>
                            <p>{!! $item['description'] !!}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if( $section3['title'] )
    <section class="video-and-news py-lg-5">
        <div class="container py-5">
            <div class="text-title text-center pb-3">
                <span>{{ $section3['top_title'] ?? '' }}</span>
                <h1>{{ $section3['title'] ?? '' }}</h1>
                <p>{{ $section3['description'] ?? '' }}</p>
            </div>
            <div class="row">
                @foreach($section3['videos'] ?? [] as $video)
                <div class="col-md-4">
                    <video src="{{ $video['video']['url'] ?? '' }}" height="250" width="auto" controls></video>
                    <p class="m-0 pt-3 fs-6 fw-bold">{{ $video['interview_title'] }}</p>
                    <p class="m-0 p-0">{{ $video['interview_description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
    <x-section-reference/>
@endsection