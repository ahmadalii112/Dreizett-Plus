@extends('layouts.master')

@section('content')
  <div class="relative isolate overflow-hidden bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <p class="text-lg font-semibold leading-8 tracking-tight text-brand-2">Entlastung für Angehörige. Begegnung
          und Aktivität für pflegebedürftige.</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Tagespflege am Berger See</h1>
        <p class="mt-6 text-xl leading-8 text-gray-700">
          Eine Begegnungsstätte für pflegebedürftige - direkt am Berger See. Hier treffen Sie auf Spaß, Freude und
          auf eine schöne Gemeinschaft.
        </p>
      </div>
      <div
        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 lg:mx-0 lg:mt-10 lg:max-w-none lg:grid-cols-12">
        <div class="relative lg:order-last lg:col-span-5">
          <figure class="border-l border-brand-2 pl-8">
            <blockquote class="text-xl font-semibold leading-8 tracking-tight text-gray-900">
              <p>“DreizettPlus kann ich ohne Einschränkung empfehlen.
                Jederzeit ansprechbar bei Sorgen und Problemen, immer mit viel Herz und Emphatie. Der
                liebevolle Umgang mit meinem Vater rundete eine hervorragende Betreuung ab. Ich bedanke mich
                nochmals herzlich bei dem gesamten Team.”</p>
            </blockquote>
            <figcaption class="mt-8 flex gap-x-4">
              <div class="text-sm leading-6">
                <div class="font-semibold text-gray-900">Silke Duerre</div>
                <div class="text-gray-600">Angehörige aus Gevelsberg</div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="max-w-xl text-base leading-7 text-gray-700 lg:col-span-7">
          <p>An der Berchemallee 99 in Gevelsberg befindet sich unsere Tagespflege. Hier treffen sich regelmäßig
            15 Personen um gemeinsam Zeit zu verbringen. Hier wird gelacht, gesungen, gebastelt, gegessen uvm.
          </p>
          <ul role="list" class="mt-8 max-w-xl space-y-8 text-gray-600">
            <li class="flex gap-x-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" strokeWidth={2.5} stroke="currentColor"
                   viewBox="0 0 24 24" class="mt-1 h-5 w-5 flex-none text-brand" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
              </svg>
              <span><strong class="font-semibold text-gray-900">15 Gäste.</strong> Auf rund 280m² treffen sich
                                regelmäßig 15 Personen um gemeinsam Zeit zu verbringen.</span>
            </li>
            <li class="flex gap-x-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" strokeWidth={2.5} stroke="currentColor"
                   viewBox="0 0 24 24" class="mt-1 h-5 w-5 flex-none text-brand" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
              </svg>
              <span><strong class="font-semibold text-gray-900">Individuelle Aktivitäten.</strong> Wir gehen
                                auf Ihre Wünsche und Hobbys ein und integrieren diese in unseren gemeinsamen Stunden.</span>
            </li>
            <li class="flex gap-x-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" strokeWidth={2.5} stroke="currentColor"
                   viewBox="0 0 24 24" class="mt-1 h-5 w-5 flex-none text-brand" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
              </svg>
              <span><strong class="font-semibold text-gray-900">Pflegekassenfinanziert</strong> Die Kosten für
                                die gemeinschaftliche Betreuung in unserer Tagespflege werden von Ihrer Pflegekasse
                                finanziert.</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="relative bg-brand">
    <div class="relative h-80 overflow-hidden bg-brand md:absolute md:left-0 md:h-full md:w-1/3 lg:w-1/2">
      <img class="h-full w-full object-cover" src="{{ asset('images/team_2.webp') }}" alt="">
    </div>
    <div class="relative mx-auto max-w-7xl py-24 sm:py-32 lg:py-40 lg:px-8">
      <div class="pr-6 pl-6 md:ml-auto md:w-2/3 md:pl-16 lg:w-1/2 lg:pl-24 lg:pr-0 xl:pl-32">
        <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Jetzt Gutschein für einen
          Schnuppertag sichern.</p>
        <p class="mt-6 text-base leading-7 text-white">Vereinbaren Sie ein kostenloses und unverbindliches
          Erstgespräch und erhalten Sie einen Gutschein für einen Schnuppertag in unserer Tagespflege. Probieren
          Sie es einfach einmal aus - Sie werden begeistert sein!</p>
        <div class="mt-8">
          <a href="https://calendly.com/dreizett-plus/erstgespraech"
             class="mt-6 rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">Jetzt
            Erstgespräch vereinbaren →</a>
        </div>
      </div>
    </div>
  </div>
@endsection
