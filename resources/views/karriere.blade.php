@extends('layouts.master')

@section('content')
  <main class="isolate">
    <!-- Hero section -->
    <div class="relative isolate -z-10">
      <div
        class="absolute top-0 left-1/2 right-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48">
        <svg viewBox="0 0 801 1036" aria-hidden="true" class="w-[50.0625rem]">
          <path fill="url(#70656b7e-db44-4b9b-b7d2-1f06791bed52)" fill-opacity=".3"
                d="m282.279 843.371 32.285 192.609-313.61-25.32 281.325-167.289-58.145-346.888c94.5 92.652 277.002 213.246 251.009-45.597C442.651 127.331 248.072 10.369 449.268.891c160.956-7.583 301.235 116.434 351.256 179.39L507.001 307.557l270.983 241.04-495.705 294.774Z"/>
          <defs>
            <linearGradient id="70656b7e-db44-4b9b-b7d2-1f06791bed52" x1="508.179" x2="-28.677"
                            y1="-116.221" y2="1091.63" gradientUnits="userSpaceOnUse">
              <stop stop-color="#6CA824"/>
              <stop offset="1" stop-color="#FFFFFF"/>
            </linearGradient>
          </defs>
        </svg>
      </div>
      <div class="overflow-hidden">
        <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
          <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
            <div class="w-full max-w-xl lg:shrink-0 xl:max-w-2xl">
              <h1 class="text-4xl font-bold tracking-tight text-brand sm:text-4xl">Werde Teil unseres Teams und freue
                Dich darauf, eine enge Beziehung zu Deinen Patienten aufzubauen.</h1>
              <p class="relative my-6 text-lg leading-8 text-gray-600 sm:max-w-md lg:max-w-none">
                Als fürsorglicher Mitarbeiter willst Du einen Arbeitsplatz, an dem Du Menschen wirklich helfen kannst.
                Wo Du Dich vollumfänglich um Deine Patienten kümmern kannst – und das ohne Zeitdruck oder Dauerstress.
                <br/><br/>
                Wir bieten Dir den perfekten Rahmen, damit Du genau das tun kannst.
              </p>
              <a href="#form"
                 class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt
                innerhalb 60 Sekunden bewerben</a>
            </div>
            <div class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
              <div
                class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                <div class="relative">
                  <img src="{{asset('images/karriere_1.webp')}}"
                       alt=""
                       class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div
                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                  </div>
                </div>
              </div>
              <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                <div class="relative">
                  <img src="{{asset('images/karriere_2.webp')}}"
                       alt=""
                       class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div
                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                  </div>
                </div>
                <div class="relative">
                  <img src="{{asset('images/karriere_3.webp')}}"
                       alt=""
                       class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div
                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                  </div>
                </div>
              </div>
              <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                <div class="relative">
                  <img src="{{asset('images/karriere_4.webp')}}"
                       alt=""
                       class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div
                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                  </div>
                </div>
                <div class="relative">
                  <img src="{{asset('images/karriere_5.webp')}}"
                       alt=""
                       class="aspect-[2/3] w-full rounded-xl bg-gray-900/5 object-cover shadow-lg">
                  <div
                    class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-gray-900/10">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Content section -->
    <div class="mx-auto -mt-12 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:-mt-8">
      <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
        <p class="text-lg font-semibold leading-8 tracking-tight text-brand-2">Über uns als Arbeitgeber</p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Willkommen bei dreizett Plus –
          Ambulanter Pflegedienst</h2>
        <p class="text-lg leading-8 text-gray-600 mt-6">Als ambulantes Pflegeunternehmen sind wir auf die Betreuung und
          Pflege von hilfs- und pflegebedürftigen Menschen spezialisiert. Wir bieten unseren Patienten im Rahmen der
          häuslichen Pflege ein umfangreiches Pflege-, Versorgungs- und Betreuungsprogramm an. Dieses ist individuell
          auf ihre Bedürfnisse abgestimmt. Der Name „dreizett Plus“ kommt von den 3 Z’s für die wir stehen: Zeit,
          Zuwendung und Zärtlichkeit. Denn wir wollen nicht nur die körperliche Versorgung gewährleisten, sondern das
          ganzheitliche Wohlbefinden. Deswegen finden wir für unsere Patienten immer die Zeit für Umarmungen, nette
          Wörter und ausführliche Gespräche.</p>

        <div class="lg:flex lg:flex-auto lg:justify-center gap-y-20 gap-x-8 mt-8">
          <div>
            <img src="{{ asset('images/top_arbeitgeber_fairfamily.webp') }}" alt="dreizett Plus Top Arbeitgeber"
                 title="Wir sind als Top-Arbeitgeber ausgezeichnet"/>
          </div>
          <div>
            <h2 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">Wir sind TOP Arbeitgeber. Und so
              profitierst Du davon.</h2>
            <p class="text-lg leading-8 text-gray-600 mt-6">Es ist unser Anspruch, einen Ort für Dich zu erschaffen, an
              dem Du gerne Zeit verbringst. Um dieses Ziel zu erreichen haben wir für Dich ein einzigartiges
              Mitarbeiterbenefit-System sowie eine gesunde Unternehmenskultur geschaffen. Deshalb wurden wir offiziell
              zum nachhaltig gesunden Arbeitgeber ausgezeichnet.</p>
          </div>
        </div>

        <div class="mt-6 lg:flex lg:flex-auto lg:justify-center gap-y-20 gap-x-8">
          <div>
            <h3 class="text-1xl font-bold tracking-tight text-gray-600 sm:text-2xl mb-4">Kultur & Umfeld</h3>
            <p class="text-lg leading-8 text-gray-600 my-6">Bei uns findest Du nahbare Führungskräfte und freundliche
              Kollegen. Es herrscht immer eine familiäre Atmosphäre.</p>
          </div>
          <div>
            <h3 class="text-1xl font-bold tracking-tight text-gray-600 sm:text-2xl mb-4">Karriere & Perspektive</h3>
            <p class="text-lg leading-8 text-gray-600 my-6">Du hast die Chance, bei uns zahlreiche Fortbildungs- und
              Aufstiegsmöglichkeiten wahrzunehmen.</p>
          </div>
          <div>
            <h3 class="text-1xl font-bold tracking-tight text-gray-600 sm:text-2xl mb-4">Mitarbeiterbenefit-System</h3>
            <p class="text-lg leading-8 text-gray-600 my-6">Als Arbeitgeber im Gesundheitsbereich sorgen wir
              selbstverständlich auch für das körperliche Wohlbefinden unserer Mitarbeiter.</p>
          </div>
          <div>
            <h3 class="text-1xl font-bold tracking-tight text-gray-600 sm:text-2xl mb-4">Mission & Vision</h3>
            <p class="text-lg leading-8 text-gray-600 my-6">Wir wollen pflegebedürftige Menschen individuell und
              umfassend unterstützen.</p>
          </div>
        </div>
      </div>
    </div>


    <!-- Image section -->
    <div class="mt-32 sm:mt-40 xl:mx-auto xl:max-w-7xl xl:px-8">
      <img src="{{asset('images/karriere_6.webp')}}"
           alt="" class="aspect-[5/2] w-full object-cover xl:rounded-3xl">
    </div>


    <!-- Content section -->
    <div class="mx-auto mt-8 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:mt-12">
      <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
        <p class="text-lg font-semibold leading-8 tracking-tight text-brand-2">Dein Arbeitsumfeld</p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Übe Deinen Job endlich so aus, wie Du es
          schon immer wolltest.</h2>
        <p class="text-lg leading-8 text-gray-600 mt-6">Wir bieten unseren Patienten ein großes Leistungsspektrum im
          ambulanten Bereich. Daher entsteht für unsere Mitarbeiter keine monotone Arbeit und sie haben immer
          Abwechslung. Mit Deinem individualisierten Dienstplan kannst Du Deinen Tagesablauf zusätzlich so
          strukturieren, wie es Dir am besten passt.</p>
        <p class="text-lg leading-8 text-gray-600 mt-6 mb-6">In Deiner täglichen Arbeit fährst Du zu den jeweiligen
          Patienten nach Hause und kümmerst Dich um die Versorgung. Dabei kannst Du Dir so viel Zeit lassen, wie die
          intensive und individuelle Betreuung des Patienten dauert. Zeitdruck und Stress gibt es bei uns nicht. Die
          Dokumentation findet bei uns vollständig digital statt, sodass die Prozesse einfach und reibungslos
          ablaufen.</p>
        <a href="#form"
           class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Jetzt
          bewerben und wieder glücklich werden</a>
      </div>
    </div>

    <!-- Content section -->
    <div class="mx-auto mt-8 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:mt-12">
      <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
        <p class="text-lg font-semibold leading-8 tracking-tight text-brand-2">Unternehmenskultur</p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Dein Wohlbefinden steht für uns an 1.
          Stelle.</h2>
        <p class="text-lg leading-8 text-gray-600 mt-6">Menschlichkeit ist bei uns nicht nur ein Wort, sondern ein
          Versprechen. Bei uns stehen der Mensch und sein Wohlbefinden im Mittelpunkt. Und das nicht nur bei unseren
          Patienten, sondern in erster Linie auch bei unseren Mitarbeitern.</p>
        <p class="text-lg leading-8 text-gray-600 mt-6">Wir setzen auf flache Hierarchien und ein familiäres
          Arbeitsumfeld. Bei uns pflegen wir ein freundschaftliches Verhältnis miteinander und sorgen dafür, dass sich
          jeder bei uns wohlfühlt. Außerdem achten wir auf einen respektvollen Umgang miteinander und legen großen Wert
          auf eine ehrliche Kommunikation.</p>
        <p class="text-lg leading-8 text-gray-600 mt-6 mb-6">Unseren Teamzusammenhalt stärken wir auch regelmäßig
          außerhalb der Arbeitszeiten. Als familienfreundlicher Arbeitgeber sind auch Kinder und Partner bei unseren
          Teamevents eingeladen.</p>
      </div>
    </div>


    <!-- Content section -->
    <div class="mx-auto mt-8 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:mt-12">
      <div class="mx-auto max-w-2xl lg:mx-0 lg:max-w-none">
        <p class="text-lg font-semibold leading-8 tracking-tight text-brand-2">Karriere & Entwicklung</p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Profitiere von Aufstiegschancen und den
          Vorteilen einer zukunftssicheren Branche.</h2>
        <p class="text-lg leading-8 text-gray-600 mt-6">Bei uns erwartet Dich ein breites Spektrum an Fortbildungs- und
          Aufstiegsmöglichkeiten. Damit kannst Du Dich in Deinem Beruf weiterentwickeln und auch persönlich wachsen.
          Dabei setzen wir auf ein internes Schulungssystem, das individuell auf Dich abgestimmt ist.</p>
        <p class="text-lg leading-8 text-gray-600 mt-6">In einer intensiven 14-tägigen Einarbeitungsphase lernst Du zu
          Beginn alles, was Du für Deinen Alltag brauchst. So kannst Du schnell Sicherheit in Deiner Arbeit gewinnen und
          Dich optimal auf die Betreuung und Pflege unserer Patienten vorbereiten.</p>
        <p class="text-lg leading-8 text-gray-600 mt-6 mb-6">Insgesamt legen wir großen Wert auf eine individuelle
          Betreuung unserer Mitarbeiter. Wir unterstützen Dich auf Deinem Karriereweg und geben Dir alle Werkzeuge an
          die Hand, die Du benötigst, um Dich in Deinem Beruf weiterzuentwickeln.</p>
        <a href="#form"
           class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Kontaktiere
          uns und wir sprechen über Deine Ziele</a>
      </div>
    </div>

    <div class="mx-auto mt-8 max-w-7xl px-6 sm:mt-0 lg:px-8 xl:mt-12">
      <div class="mt-16 space-y-20 lg:mt-20 lg:space-y-20">
        <article class="relative isolate flex flex-col gap-8 lg:flex-row">
          <div class="relative aspect-[2/1] sm:aspect-[2/1] lg:w-64 lg:shrink-0">
            <img
              src="https://img.wp.de/img/ennepetal-gevelsberg-schwelm/crop237415765/4057656153-w1200-cv16_9-q85/9ecb9a5a-980a-11ed-acb9-0a2f83637b45.jpg"
              alt="" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
            <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
          </div>
          <div>
            <div class="flex items-center gap-x-4 text-xs">
              <time datetime="2020-03-16" class="text-gray-500">19.01.2023</time>
              <a
                href="https://www.wp.de/staedte/ennepetal-gevelsberg-schwelm/neue-betreuung-pflegedienst-expandiert-in-gevelsberg-id237415769.html"
                class="relative z-10 rounded-full bg-gray-50 py-1.5 px-3 font-medium text-gray-600 hover:bg-gray-100">Westfalenpost</a>
            </div>
            <div class="group relative max-w-xl">
              <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <a
                  href="https://www.wp.de/staedte/ennepetal-gevelsberg-schwelm/neue-betreuung-pflegedienst-expandiert-in-gevelsberg-id237415769.html">
                  <span class="absolute inset-0"></span>
                  Neue Betreuung: Pflegedienst expandiert in Gevelsberg
                </a>
              </h3>
              <p class="mt-5 text-sm leading-6 text-gray-600">Gabriele Landolfo, Geschäftsführer des ambulanten
                Pflegedienstes "dreizett Plus" in Gevelsberg, hat neue Pläne für die Erweiterung des
                Betreuungsangebotes. Der Pflegedienst plant in der Gevelsberger Innenstadt einen Neubau, der speziell
                auf die Bedürfnisse älterer Menschen zugeschnitten ist. Dort sollen eine Senioren-WG und altersgerechtes
                Wohnen angeboten werden. Mit diesem erweiterten Betreuungsangebot wollen wir als Pflegedienst einen
                wichtigen Beitrag zur Unterstützung älterer Menschen in Gevelsberg leisten.</p>
            </div>
          </div>
        </article>
      </div>
    </div>

    <div class="bg-brand py-16 sm:py-12 mt-12">
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


    <!-- Values section -->
    <div class="mx-auto mt-32 max-w-7xl px-6 sm:mt-32 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Unser dreizett Plus Benefit-System</h2>
        <p class="mt-6 text-lg leading-8 text-gray-600">Erhalte Zugriff auf über 300 Gesundheitsleistungen und viele
          weitere Benefits – und sogar deine Familienangehörigen profitieren gleich mit! </p>
      </div>
      <dl
        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 text-base leading-7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 mb-6">
        <div>
          <dt class="font-semibold text-gray-900">dreizett Plus-Rabatte bei über 500 Online-Shops in ganz Deutschland
          </dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Jährliches Gesundheitsbudget von 600 € für Massage, Brille,
            Heilpraktiker, Physiotherapie u. v. m.
          </dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Digitaler Gesundheitscoach</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Facharzt-Netzwerk und Termine innerhalb von 5–10 Tagen</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Gesundheitsservices für deine Familie und Freunde</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Geld- oder Sachprämien durch das Nutzen unserer App</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">24/7 Gesundheitstelefon</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Gesundheits-Check-ups im Wert von über 300 € im Jahr</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Schritt- und Achtsamkeitschallenges</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Team-Building-Maßnahmen</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">dreizett Plus-Rente mit hohem Zuschuss</dt>
        </div>
        <div>
          <dt class="font-semibold text-gray-900">Kostenlose Heißgetränke</dt>
        </div>
      </dl>

      <a href="#form"
         class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Erfahre
        mit einer Bewerbung mehr über unser Benefit-System</a>
    </div>


    <!--<div class="bg-brand py-24 sm:py-32 mt-32">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
              <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Das sagen unsere Mitarbeiter</h2>
              </div>
              <ul role="list" class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-14 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 xl:grid-cols-4">
                <li>
                  {{--<img class="aspect-[14/13] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">--}}
    <h3 class="mt-6 text-lg font-bold leading-8 tracking-tight text-white">Jenni K.</h3>
    <p class="text-base leading-7 text-gray-100 font-semibold">Krankenpflegehelferin</p>
    <p class="text-sm leading-6 text-white">Ich habe endlich einen Arbeitgeber gefunden, der wertschätzt, was ich täglich für meine Patienten leiste.</p>
  </li>
  <li>
{{--<img class="aspect-[14/13] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">--}}
    <h3 class="mt-6 text-lg font-bold leading-8 tracking-tight text-white">David Sauer</h3>
    <p class="text-base leading-7 text-gray-100 font-semibold">Pflegeberater</p>
    <p class="text-sm leading-6 text-white">Bei dreizett Plus kann ich mich beruflich entfalten. Meine Weiterbildung zum Pflegeberater konnte ich hier erfolgreich absolvieren und das Gelernte direkt selbständig in der Praxis anwenden.</p>
  </li>
  <li>
{{--<img class="aspect-[14/13] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">--}}
    <h3 class="mt-6 text-lg font-bold leading-8 tracking-tight text-white">Lisa Klaas</h3>
    <p class="text-base leading-7 text-gray-100 font-semibold">PDL Hagen</p>
    <p class="text-sm leading-6 text-white">Hier konnte ich mich beruflich weiterentwickeln und sogar meinen eigenen dreizett Plus Standort eröffnen.</p>
  </li>
  <li>
{{--<img class="aspect-[14/13] w-full rounded-2xl object-cover" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=8&w=1024&h=1024&q=80" alt="">--}}
    <h3 class="mt-6 text-lg font-bold leading-8 tracking-tight text-white">Kevin B.</h3>
    <p class="text-base leading-7 text-gray-100 font-semibold">stellv. PDL Gevelsberg</p>
    <p class="text-sm leading-6 text-white">Was hier tagtäglich für die Mitarbeiter getan wird habe ich so bisher nicht erlebt. Davon können sich andere Pflegedienste eine dicke Scheibe von abschneiden!</p>
  </li>
</ul>
</div>
</div>-->


    <!-- Values section -->
    <div class="mx-auto mt-32 mb-7 max-w-7xl px-6 sm:mt-32 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">So läuft unser Bewerbungsprozess ab</h2>
      </div>
      <dl
        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 text-base leading-7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-4 mb-6">
        <div>
          <dt class="font-bold text-gray-900 text-2xl">1. Deine Bewerbung</dt>
          <dd class="mt-1 text-gray-600">Bewirb dich über unsere Karriereseite. Sobald Deine Bewerbung eingegangen ist,
            erhalten wir eine Benachrichtigung.
          </dd>
        </div>
        <div>
          <dt class="font-bold text-gray-900 text-2xl">2. Erstgespräch</dt>
          <dd class="mt-1 text-gray-600">Wir melden uns innerhalb von 24 Stunden bei Dir. Wenn uns Deine Person
            überzeugt, laden wir Dich in einem kurzen Telefonat zum Vorstellungsgespräch ein.
          </dd>
        </div>
        <div>
          <dt class="font-bold text-gray-900 text-2xl">3. Vorstellungsgespräch</dt>
          <dd class="mt-1 text-gray-600">Im Vorstellungsgespräch lernen wir Dich und das, was Dich ausmacht, besser
            kennen! Wir erklären Dir mehr über die Stelle und Du kannst uns all Deine Fragen stellen.
          </dd>
        </div>
        <div>
          <dt class="font-bold text-gray-900 text-2xl">4. Dein Start bei dreizett Plus</dt>
          <dd class="mt-1 text-gray-600">Wenn Du uns im Vorstellungsgespräch überzeugt hast, bekommst Du zeitnah eine
            Zusage mit Arbeitsvertrag. Danach beginnt Deine intensive Einarbeitungsphase.
          </dd>
        </div>
      </dl>
      <a href="#form"
         class="rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand mt-6">Hier
        klicken und den ersten Schritt einleiten</a>
    </div>

    <a name="form"></a>
    <script src="https://static.heyflow.app/widget/latest/webview.js"></script>
    <heyflow-wrapper flow-id="karriere-dreizett" dynamic-height style-config='{"width": "100%"}'></heyflow-wrapper>

    <div class="bg-white py-24 sm:py-32">
      <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl space-y-16 divide-y divide-gray-100 lg:mx-0 lg:max-w-none">
          <div class="grid grid-cols-1 gap-y-10 gap-x-8 lg:grid-cols-3">
            <div>
              <h2 class="text-3xl font-bold tracking-tight text-gray-900">Wir nehmen Dich an die Hand und führen Dich
                durch den Bewerbungsprozess</h2>
              <p class="mt-4 leading-7 text-gray-600">Du hast Rückfragen zu einer Stelle? Dann melde Dich gerne bei uns!
                In einem persönlichen Telefonat helfen wir gerne weiter. </p>
            </div>
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:col-span-2 lg:gap-8">
              <div class="rounded-2xl bg-gray-50 p-10">
                <h3 class="text-base font-semibold leading-7 text-gray-900">Dein Ansprechpartner</h3>
                <dl class="mt-3 space-y-1 text-sm leading-6 text-gray-600">
                  <div class="mt-1">
                    <dd class="font-bold">Gabriele Landolfo</dd>
                  </div>
                  <div class="mt-1">
                    <dd>Geschäftsführer & Leiter HR</dd>
                  </div>
                  <div class="mt-1">
                    <dd><a href="mailto:gl@dreizett-plus.de">gl@dreizett-plus.de</a></dd>
                  </div>
                  <div class="mt-1">
                    <dd>Tel: <a href="tel:023325096337">02332 - 50 96 337</a></dd>
                  </div>
                </dl>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <iframe width="100%" height="500px" frameborder="0" allowfullscreen
            src="//umap.openstreetmap.de/de/map/unbenannte-karte_39790?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe>

  </main>
@endsection
