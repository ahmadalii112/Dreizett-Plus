@extends('layouts.master')

@section('content')
  <div class="relative isolate overflow-hidden pt-14 bg-brand">
    <img src="{{ asset('images/team_hero.webp') }}" alt=""
         class="absolute inset-0 -z-10 h-full w-full object-cover opacity-30">
    <div class="mx-auto max-w-2xl py-8 sm:py-8 lg:py-8">
      <div class="text-center">
        <h1 class="text-4xl font-bold text-white pb-3">Ihr ambulanter Pflegedienst mit dem Plus in Ihrer Pflege.</h1>
        <h3 class="text-2xl text-white pb-6">Ambulante Pflege | Tagespflege | Demenz-WG</h3>
        <video controls autoplay>
          <source src="{{ asset('mp4/brand_video.mp4') }}" type="video/mp4">
          Ihr Browser akzeptiert keine Videos. Bitte mit einem anderen Browser probieren.
        </video>
        <div class="mt-10 flex items-center justify-center gap-x-6">
          <a href="https://calendly.com/dreizett-plus/erstgespraech"
             class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">Jetzt
            Erstgespräch vereinbaren →</a>
          <!--<a href="#" class="text-sm font-semibold leading-6 text-white">Mehr  <span aria-hidden="true">→</span></a>-->
        </div>
      </div>
    </div>
  </div>

  <div class="overflow-hidden bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl md:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-y-16 gap-x-8 sm:gap-y-20 lg:grid-cols-2 lg:items-start">
        <div class="px-6 lg:px-0 lg:pt-4 lg:pr-4">
          <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-lg">
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-brand sm:text-4xl">Ambulante Pflege vom
              Experten</h1>
            <p class="mt-6 text-lg leading-8 text-gray-600">Wir haben uns als Pflegeteam eins auf die Fahne
              geschrieben: die Pflege ein großes Stück zu verbessern. Für Sie bedeutet dies, dass Sie als Person
              wertgeschätzt werden
              und in professionellen Händen die Möglichkeit haben, würdevoll zu altern.</p>
            <dl class="mt-10 max-w-xl space-y-8 text-base leading-7 text-gray-600 lg:max-w-none">
              <div class="relative">
                <dt class="inline font-semibold text-gray-900">
                  Grundpflege
                </dt>
                <dd class="inline">Die grundpflegerische Versorgung umfasst beispielsweise die aktivierende
                  Pflege, Ganz- und Teilwaschungen, Hilfe beim An- und Auskleiden, Hilfe bei der
                  Nahrungsaufnahme oder auch die Forderung der Mobilität.
                </dd>
              </div>

              <div class="relative">
                <dt class="inline font-semibold text-gray-900">
                  Behandlungspflege
                </dt>
                <dd class="inline">Die behandlungspflegerische Versorgung umfasst beispielsweise die
                  Medikamentengabe, Blutdruck- und Blutzuckerkontrolle sowie die Wundversorgung.
                </dd>
              </div>

              <div class="relative">
                <dt class="inline font-semibold text-gray-900">
                  OP-Nachsorge
                </dt>
                <dd class="inline">Wir sorgen uns nach einem Krankenhausaufenthalt um Sie – sodass Sie
                  schnellst- und bestmöglich wieder gesund werden!
                </dd>
              </div>

              <div class="relative">
                <dt class="inline font-semibold text-gray-900">
                  Diabetes-Schwerpunkt
                </dt>
                <dd class="inline">Wir versorgen Menschen mit Diabetes mellitus oder Menschen mit
                  diabetischem Fußsyndrom.
                </dd>
              </div>

              <button class="rounded-md bg-brand text-white font-bold hover:bg-brand/80 p-4">Mehr erfahren
                →
              </button>
            </dl>
          </div>
        </div>
        <div class="sm:px-6 lg:px-0">
          <div class="relative isolate overflow-hidden sm:rounded-3xl lg:max-w-none">
            <div class="mx-auto max-w-2xl sm:mx-0 sm:max-w-none">
              <img src="{{ asset('images/team_1.webp') }}" alt="Team dreizett Plus">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-brand py-12 sm:py-12">
    <h2 class="text-3xl text-white text-center pb-6">Wir sind das Team dreizett...</h2>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <dl class="grid grid-cols-1 gap-y-16 gap-x-8 text-center lg:grid-cols-3">
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-white">Standorte</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl">3</dd>
        </div>

        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-white">Mitarbeiter</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl">> 100</dd>
        </div>

        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-white">Gegründet</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl">2015</dd>
        </div>
      </dl>
    </div>
  </div>


  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div
        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Unsere Tagespflege: Ein Ort für
          Begegnung, Aktivität und Geborgenheit.</h2>
        <dl class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2">
          <div>
            <dt class="text-base font-semibold leading-7 text-gray-900">
              Gemeinsam, statt einsam
            </dt>
            <dd class="mt-1 text-base leading-7 text-gray-600">Unsere Tagespflege mit 15 Plätzen bietet älteren
              Menschen tagsüber eine liebevolle Betreuung und abwechslungsreiche Aktivitäten in einer
              freundlichen und familiären Umgebung. Hier können sie gemeinsam mit anderen Senioren den Tag
              verbringen und dabei soziale Kontakte knüpfen und pflegen. Unsere geschulten Mitarbeiterinnen
              und Mitarbeiter kümmern sich um individuelle Bedürfnisse und sorgen für eine angenehme
              Atmosphäre.
            </dd>
            <p class="mt-6">
              <a href="/tagespflege" class="text-sm font-semibold leading-6 text-gray-600">Mehr erfahren <span
                  aria-hidden="true">→</span></a>
            </p>
          </div>

          <div>
            <dt class="text-base font-semibold leading-7 text-gray-900">
              Entlastung für Angehörige
            </dt>
            <dd class="mt-1 text-base leading-7 text-gray-600">Unsere Tagespflege bietet Ihnen als Angehörigen
              die Möglichkeit, ihre Lieben tagsüber in professionelle Hände zu geben. Das gibt Ihnen Zeit für
              eigene Termine und Entspannung, ohne sich Sorgen machen zu müssen.
            </dd>
            <p class="mt-6">
              <a href="/tagespflege" class="text-sm font-semibold leading-6 text-gray-600">Mehr erfahren <span
                  aria-hidden="true">→</span></a>
            </p>
          </div>

        </dl>

      </div>
    </div>
  </div>

  <div class="bg-brand py-12 sm:py-12">
    <h2 class="text-3xl text-white text-center pb-6">Unsere Tagespflege bietet...</h2>
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <dl class="grid grid-cols-1 gap-y-16 gap-x-8 text-center lg:grid-cols-3">
        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-white">Plätze pro Tag</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl">15</dd>
        </div>

        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-white">Entlastung in der Woche</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl">08:30 - 16 Uhr</dd>
        </div>

        <div class="mx-auto flex max-w-xs flex-col gap-y-4">
          <dt class="text-base leading-7 text-white">Platz für Individualität</dt>
          <dd class="order-first text-3xl font-semibold tracking-tight text-white sm:text-5xl">280m²</dd>
        </div>
      </dl>
    </div>
  </div>

  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div
        class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Wenn es Zuhause nicht mehr möglich
          ist: Unsere Wohngemeinschaften</h2>
        <dl class="col-span-2 grid grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2">
          <div>
            <dt class="text-base font-semibold leading-7 text-gray-900">
              Wohngemeinschaft Gevelsberg
            </dt>
            <dd class="mt-1 text-base leading-7 text-gray-600">
              In einer ruhigen Sackgasse befindet sich unsere in 2017 eröffnete Wohngemeinschaft für 9
              demenziell veränderte Menschen. Auf rund 350m² mit einer großen Sonnenterrasse finden unsere
              Patienten ein Stück Zuhause wieder.
              <p class="mt-6">
                <a href="https://dreizett-wohngemeinschaft.de/"
                   class="text-sm font-semibold leading-6 text-gray-600">Mehr erfahren <span
                    aria-hidden="true">→</span></a>
              </p>
            </dd>
          </div>

          <div>
            <dt class="text-base font-semibold leading-7 text-gray-900">
              Wohngemeinschaft Gevelsberg-Berge
            </dt>
            <dd class="mt-1 text-base leading-7 text-gray-600">
              Seit 2021 befindet sich direkt am Berger See unsere Demenz-Wohngemeinschaft in einem Neubau. Die
              Lage lädt zu ausgedehnten Spaziergängen in der Natur ein.
              <p class="mt-6">
                <a href="https://dreizett-wohngemeinschaft.de/"
                   class="text-sm font-semibold leading-6 text-gray-600">Mehr erfahren <span
                    aria-hidden="true">→</span></a>
              </p>
            </dd>
          </div>

          <!--<div>
              <dt class="text-base font-semibold leading-7 text-gray-900">
                  Wohngemeinschaft Ennepetal Breslauer Platz
              </dt>
              <dd class="mt-1 text-base leading-7 text-gray-600">
                  Ab Juli 2023 finden in unserer Wohngemeinschaft in Ennepetal 16 Personen mit Demenz Platz. Wir
                  bieten eine umfassende Betreuung, speziell ausgerichtet auf demenziell veränderte Menschen.
                  <p class="mt-6">
                      <a href="https://dreizett-wohngemeinschaft.de/"
                          class="text-sm font-semibold leading-6 text-gray-600">Mehr erfahren <span
                              aria-hidden="true">→</span></a>
                  </p>
              </dd>
          </div>-->

        </dl>

      </div>
    </div>
  </div>

  <div class="bg-brand py-12 sm:py-12">
    <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center">
      <i class="text-white text-4xl ">&bdquo;Gib jedem Tag die Chance, der schönste deines Lebens zu
        werden.&quot;</i>
      <p class="text-white">Mark Twain</p>
    </div>
  </div>

  <div class="bg-white">
    <div class="py-24 px-6 sm:px-6 sm:py-32 lg:px-8">
      <div class="mx-auto max-w-2xl text-center">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Jetzt Erstgespräch vereinbaren.
        </h2>
        <h3 class="text-2xl tracking-tight text-gray-900">Selbstverständlich kostenlos und unverbindlich.</h3>
        <div class="mt-10 flex items-center justify-center gap-x-6">
          <a href="https://calendly.com/dreizett-plus/erstgespraech"
             class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">Jetzt
            Termin wählen <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </div>
  </div>
@endsection