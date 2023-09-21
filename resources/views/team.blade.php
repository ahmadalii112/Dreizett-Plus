@extends('layouts.master')

@section('content')
  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <p class="text-lg font-semibold leading-8 tracking-tight text-brand-2">Eine Gemeinschaft. Eine Familie. Ein
          Team.</p>
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Wir sind dreizett</h2>
        <p class="mt-6 text-lg leading-8 text-gray-600">Ein Team, das mit Leidenschaft und hoher Fachkompetenz pflegt
          und berät. Wir haben das Herz am rechten Fleck - das zeichnet uns aus.</p>
      </div>
      <ul role="list"
          class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <li>
          <img class="aspect-[3/2] w-full rounded-2xl object-cover"
               src="{{asset('images/team/dummy.webp')}}"
               alt="">
          <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">Gabriele Landolfo</h3>
          <p class="text-base leading-7 text-gray-600">Gründer und Geschäftsführer</p>
        </li>

        <li>
          <img class="aspect-[3/2] w-full rounded-2xl object-cover"
               src="{{asset('images/team/dummy.webp')}}"
               alt="">
          <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">David Sauer</h3>
          <p class="text-base leading-7 text-gray-600">Pflegeberater und strategische Planung</p>
        </li>

        <li>
          <img class="aspect-[3/2] w-full rounded-2xl object-cover"
               src="{{asset('images/team/dummy.webp')}}"
               alt="">
          <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">Patrizia Meschke</h3>
          <p class="text-base leading-7 text-gray-600">Pflegedienstleitung Gevelsberg</p>
        </li>

        <li>
          <img class="aspect-[3/2] w-full rounded-2xl object-cover"
               src="{{asset('images/team/dummy.webp')}}"
               alt="">
          <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">Kevin Berbuesse</h3>
          <p class="text-base leading-7 text-gray-600">stellv. Pflegedienstleitung Gevelsberg</p>
        </li>

        <li>
          <img class="aspect-[3/2] w-full rounded-2xl object-cover"
               src="{{asset('images/team/dummy.webp')}}"
               alt="">
          <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">Lisa Klaas</h3>
          <p class="text-base leading-7 text-gray-600">Pflegedienstleitung Hagen</p>
        </li>

        <li>
          <img class="aspect-[3/2] w-full rounded-2xl object-cover"
               src="{{asset('images/team/dummy.webp')}}"
               alt="">
          <h3 class="mt-6 text-lg font-semibold leading-8 tracking-tight text-gray-900">Laura Nöther</h3>
          <p class="text-base leading-7 text-gray-600">stellv. Pflegedienstleitung Hagen</p>
        </li>

      </ul>
    </div>
  </div>


  <div class="relative bg-brand">
    <div class="relative h-80 overflow-hidden bg-brand md:absolute md:left-0 md:h-full md:w-1/3 lg:w-1/2">
      <img class="h-full w-full object-cover" src="{{ asset('images/team_2.webp') }}" alt="">
    </div>
    <div class="relative mx-auto max-w-7xl py-24 sm:py-32 lg:py-40 lg:px-8">
      <div class="pr-6 pl-6 md:ml-auto md:w-2/3 md:pl-16 lg:w-1/2 lg:pl-24 lg:pr-0 xl:pl-32">
        <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Werde Teil von unserer Vision.</p>
        <p class="mt-6 text-base leading-7 text-white">Wir sind immer auf der Suche nach Personen, die unsere Vision
          teilen und mit uns gemeinsam die Pflege revolutionieren. Informiere dich auf unserer Karriereseite, welche
          Vorteile dich bei uns erwarten.</p>
        <div class="mt-8">
          <a href="/karriere"
             class="mt-6 rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">Zur
            Karriereseite →</a>
        </div>
      </div>
    </div>
  </div>
@endsection
