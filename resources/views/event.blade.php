@extends('layouts.master')

@section('content')
  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto lg:mx-0">
        <p class="text-lg font-semibold leading-8 tracking-tight text-brand-2">04.05.2023 um 17:30 Uhr, Eintritt frei
          (mit Reservierung)</p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Infoveranstaltung für pflegende
          Angehörige</h2>
        <p class="mt-6 mb-6 text-lg leading-8 text-gray-600">
          Es gibt zahlreiche Menschen, die sich in einer schwierigen Situation befinden, da sie zwischen den
          verschiedenen Ansprüchen des Lebens und ihren eigenen Erwartungen zerrissen sind. Menschen, die für die Pflege
          anderer verantwortlich sind, erfahren eine zusätzliche Belastung aufgrund der Besonderheiten dieser Situation.
          Hierdurch steigt das Risiko, sowohl physische als auch psychische Erkrankungen zu entwickeln.<br/><br/>
          Unsere Informationsveranstaltungen zielen darauf ab, Sie über spezifische Themen zu informieren,
          beispielsweise die Leistungsansprüche gegenüber Pflege- und Krankenkassen, verschiedene Erkrankungen sowie
          Wege zur Entlastung. Wir sind offen dafür, in den Veranstaltungen Themen zu behandeln, die von pflegenden
          Angehörigen vorgeschlagen werden. Aus diesem Grund empfehlen wir Ihnen, an unseren vierteljährlichen Events
          teilzunehmen.
        </p>
        <a href="#form"
           class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt
          Platz reservieren</a>
      </div>
    </div>
  </div>

  <div class="bg-white">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-5">
      <div class="max-w-2xl xl:col-span-2">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Die Sprecher</h2>
        <p class="mt-6 text-lg leading-8 text-gray-600">Lernen Sie unsere Sprecher am Tag der Veranstaltung kennen und
          stellen Sie am Ende der Veranstaltung individuelle Fragen, die direkt von den Experten beantwortet werden.</p>
      </div>
      <ul role="list" class="-mt-12 space-y-12 divide-y divide-gray-200 xl:col-span-3">

        <li class="flex flex-col gap-10 pt-12 sm:flex-row">
          <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
               src="{{asset('images/event/frau_alze.webp')}}"
               alt="">
          <div class="max-w-xl flex-auto">
            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">Daniela Alze</h3>
            <p class="text-base leading-7 text-gray-600">Seniorenbüro Gevelsberg</p>
            <p class="mt-6 text-base leading-7 text-gray-600 mb-6">
              Frau Alze ist langjährige Seniorenbeauftragte der Stadt Gevelsberg und übernimmt die Moderation der
              Infoveranstaltung.
            </p>
            <a href="#form"
               class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt
              Platz reservieren</a>
          </div>
        </li>

        <li class="flex flex-col gap-10 pt-12 sm:flex-row">
          <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
               src="{{asset('images/team/gabriele_landolfo.webp')}}"
               alt="">
          <div class="max-w-xl flex-auto">
            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">Gabriele Landolfo</h3>
            <p class="text-base leading-7 text-gray-600 mb-4">Geschäftsführer dreizett Plus ambulanter Pflegedienst</p>
            <b class="leading-7 text-brand text-lg">&ldquo;Diese Pflege- und Krankenkassenleistungen sollten Sie für
              mehr Entlastung im Alltag kennen.&rdquo;</b>
            <p class="mt-6 mb-6 text-base leading-7 text-gray-600">
              Herr Landolfo ist Initiator der Infoveranstaltungen für pflegende Angehörige. Als Pflegeexperte informiert
              Sie Herr Landolfo über die Leistungen der Pflegeversicherung, insbesondere über die häusliche Pflege,
              Tagespflege, Verhinderungspflege, Kurzzeitpflege und Entlastungsleistungen.
            </p>
            <a href="#form"
               class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt
              Platz reservieren</a>
          </div>
        </li>

        <li class="flex flex-col gap-10 pt-12 sm:flex-row">
          <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
               src="https://www.dsp-wetter.de/wp-content/uploads/2017/01/47-214x300.jpg" alt="">
          <div class="max-w-xl flex-auto">
            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">Tanja Siekmeier</h3>
            <p class="text-base leading-7 text-gray-600 mb-4">Wundmanagerin AWM, Wundassistentin DDG</p>
            <b class="leading-7 text-brand text-lg">&ldquo;Diabetes und seine Folgeerkrankungen.&rdquo;</b>
            <p class="mt-6 mb-6 text-base leading-7 text-gray-600">
              Frau Siekmeier von der Fußambulanz der Diabetes- und Stoffwechselpraxis in Wetter informiert als
              Wundmanagerin und Wundassistentin umfassend und fundiert u.a. über das diabetische Fußsyndrom,
              Polyneuropathie, periphere arterielle Verschlusskrankheit (PAVK) und weitere Themen.
            </p>
            <a href="#form"
               class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt
              Platz reservieren</a>
          </div>
        </li>

        <!--<li class="flex flex-col gap-10 pt-12 sm:flex-row">
                    <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover" src="{{asset('images/event/tzevelekaki.png')}}" alt="">
                    <div class="max-w-xl flex-auto">
                        <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">Georgia Tzevelekaki</h3>
                        <p class="text-base leading-7 text-gray-600 mb-4">Inhaberin der Praxis für Podologie im MEDiG-Center Wetter</p>
                        <b class="leading-7 text-brand text-lg">&ldquo;Fußpflege bei Diabetiker&rdquo;</b>
                        <p class="mt-6 mb-6 text-base leading-7 text-gray-600">
                            Als Inhaberin der Praxis für Podologie in Wetter wird Frau Tzevelekaki Ihnen genau erklären, welche Voraussetzungen erfüllt sein müssen, damit die Krankenkasse Ihre podologische Behandlung übernimmt.
                        </p>
                        <a href="#form" class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt Platz reservieren</a>
                    </div>
                </li>-->

        <li class="flex flex-col gap-10 pt-12 sm:flex-row">
          <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
               src="{{asset('images/team/marco_landolfo.webp')}}" alt="">
          <div class="max-w-xl flex-auto">
            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">Marco Landolfo</h3>
            <p class="text-base leading-7 text-gray-600 mb-4">Geschäftsführer Pflegetüte GmbH</p>
            <b class="leading-7 text-brand text-lg">&ldquo;Hausnotrufsysteme und zum Verbrauch bestimmter
              Pflegehilfsmittel&rdquo;</b>
            <p class="mt-6 mb-6 text-base leading-7 text-gray-600">
              Herr Marco Landolfo informiert Sie umfassend über die Voraussetzungen für die Kostenübernahme von
              Hausnotrufsystemen und den zum Verbrauch bestimmter Pflegehilfsmittel.
            </p>
            <a href="#form"
               class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt
              Platz reservieren</a>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <div class="bg-white pt-32">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-20 px-6 lg:px-8 xl:grid-cols-5">
      <div class="max-w-2xl xl:col-span-2">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Ort und Zeit</h2>
        <p class="mt-6 text-lg leading-8 text-gray-600">Unsere Informationsveranstaltungen werden überwiegend in
          Gevelsberg abgehalten und stehen allen Interessierten aus den umliegenden Ortschaften offen.</p>
      </div>
      <ul role="list" class="-mt-12 space-y-12 divide-y divide-gray-200 xl:col-span-3">

        <li class="flex flex-col gap-10 pt-12 sm:flex-row">
          <img class="aspect-[4/5] w-52 flex-none rounded-2xl object-cover"
               src="https://www.gevelsberg.de/media/custom/3061_856_1_g.JPG?1571150655"
               alt="">
          <div class="max-w-xl flex-auto">
            <h3 class="text-lg font-semibold leading-8 tracking-tight text-gray-900">Bürgerhaus Alte Johanneskirche</h3>
            <p class="text-base leading-7 text-gray-600">Uferstraße 3, 58285 Gevelsberg</p>
            <p class="mt-6 mb-6 text-base leading-7 text-gray-600">
              Das Bürgerhaus Alte Johanneskirche bietet Platz für bis zu 80 Gäste. Sichern Sie sich jetzt Ihren Platz,
              bevor alle Plätze vergeben sind, indem Sie eine Reservierung vornehmen.
              <br/><br/>
              <b>Datum: 04.05.2023</b><br/>
              <b>Uhrzeit: 17:30</b>
            </p>
            <a href="#form"
               class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt
              Platz reservieren</a>
          </div>
        </li>

      </ul>
    </div>
  </div>


  <div class="bg-white pt-32">
    <div class="pt-16">
      <a name="form"></a>
      <script src="https://static.heyflow.app/widget/latest/webview.js"></script>
      <heyflow-wrapper flow-id="infoabend-dreizett" dynamic-height style-config='{"width": "100%"}'></heyflow-wrapper>
    </div>
  </div>

@endsection
