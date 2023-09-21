@extends('layouts.master')

@section('content')
  <div class="relative isolate overflow-hidden bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <p class="text-lg font-semibold leading-8 tracking-tight text-brand-2">Know-How trifft auf Leidenschaft.</p>
        <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Ambulante Pflege mit Herz und
          Verstand.</h1>
        <p class="mt-6 text-xl leading-8 text-gray-700">
          Wir lieben was wir tun. Denn der größte Lohn unserer täglichen Arbeit ist Ihr Lächeln, eine Umarmung oder
          ausgiebige Gespräche.
        </p>
      </div>
      <div
        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-y-16 gap-x-8 lg:mx-0 lg:mt-10 lg:max-w-none lg:grid-cols-12">
        <div class="relative lg:order-last lg:col-span-5">
          <figure class="border-l border-brand-2 pl-8">
            <blockquote class="text-xl font-semibold leading-8 tracking-tight text-gray-900">
              <p>“Drei-H > herzlich-harmonisch-hilfsbereit
                Das Pflegeteam G.Landolfo hat meine Mutter 4 Jahre betreut; ohne dieses Team hätten wir es nicht
                geschafft.
                Immer ansprechbar, Tag und Nacht, jederzeit ansprechbar.
                Sympathische, unendlich freundliche mitarbeiter/Innen, die alle stets ein offenes Ohr für alle Probleme
                und Fragen hatten.
                Herrn Landolfo nochmals besten Dank für seinen Einsatz, Hilfe und Unterstützung.”</p>
            </blockquote>
            <figcaption class="mt-8 flex gap-x-4">
              <div class="text-sm leading-6">
                <div class="font-semibold text-gray-900">Claudia W.</div>
                <div class="text-gray-600">Angehörige aus Gevelsberg</div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="max-w-xl text-base leading-7 text-gray-700 lg:col-span-7">
          <p>Unser Einsatz hört nicht bei der Pflege selbst auf. Wir betrachten jeden unserer Patienten als
            Familienmitglied und kümmern uns um Ihr ganzheitliches Wohlbefinden. Ihre individuellen Wünsche werden
            berücksichtigt.</p>
          <ul role="list" class="mt-8 max-w-xl space-y-8 text-gray-600">
            <li class="flex gap-x-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" strokeWidth={2.5} stroke="currentColor"
                   viewBox="0 0 24 24" class="mt-1 h-5 w-5 flex-none text-brand" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
              </svg>
              <span><strong class="font-semibold text-gray-900">Vollumfängliche Beratung.</strong> Durch unsere fachliche Kompetenz hinsichtlich verfügbarer Pflegeleistungen, können wir gemeinsam ein Pflegekonzept ausarbeiten, der Ihren Wünschen gerecht wird.</span>
            </li>
            <li class="flex gap-x-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" strokeWidth={2.5} stroke="currentColor"
                   viewBox="0 0 24 24" class="mt-1 h-5 w-5 flex-none text-brand" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
              </svg>
              <span><strong class="font-semibold text-gray-900">TOP ausgebildete Pflegekräfte.</strong> Unsere Pflegekräfte verfolgen alle die gleiche Vision: Endlich wieder mehr Zeit für Umarmungen, nette Wörter und Zeit für Gespräche. Dabei kommt die Expertise nicht zu kurz. Regelmäßige Weiterbildungen gehören zum Programm.</span>
            </li>
            <li class="flex gap-x-3">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" strokeWidth={2.5} stroke="currentColor"
                   viewBox="0 0 24 24" class="mt-1 h-5 w-5 flex-none text-brand" aria-hidden="true">
                <path strokeLinecap="round" strokeLinejoin="round" d="M4.5 12.75l6 6 9-13.5"/>
              </svg>
              <span><strong class="font-semibold text-gray-900">Note "sehr gut"</strong> Wir haben durchgehend die Qualitätsprüfungen des medizinischen Dienstes an allen Standorten mit "sehr gut" bestanden.</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="relative bg-brand">
    <div class="relative h-80 overflow-hidden bg-indigo-600 md:absolute md:left-0 md:h-full md:w-1/3 lg:w-1/2">
      <img class="h-full w-full object-cover" src="{{asset('images/team_2.webp')}}" alt="">
    </div>
    <div class="relative mx-auto max-w-7xl py-24 sm:py-32 lg:py-40 lg:px-8">
      <div class="pr-6 pl-6 md:ml-auto md:w-2/3 md:pl-16 lg:w-1/2 lg:pl-24 lg:pr-0 xl:pl-32">
        <p class="mt-2 text-3xl font-bold tracking-tight text-white sm:text-4xl">Jetzt Erstgespräch vereinbaren.</p>
        <p class="mt-6 text-base leading-7 text-white">Sehr gern beraten wir Sie in einem kostenlosen und
          unverbindlichen Erstgespräch über die Möglichkeiten einer Zusammenarbeit. Dabei gehen wir individuell auf Ihre
          Bedürfnisse ein und zeigen Ihnen, welche Pflegekassenleistungen Ihnen zustehen.</p>
        <div class="mt-8">
          <a href="https://calendly.com/dreizett-plus/erstgespraech"
             class="mt-6 rounded-md bg-brand-2 hover:bg-brand-2/80 border-white px-3.5 py-3.5 text-sm font-semibold text-white shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand">Jetzt
            Erstgespräch vereinbaren →</a>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Unsere Leistungen im Detail.</h2>
      </div>
      <dl
        class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 text-base leading-7 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3">
        <div>
          <dt class="font-semibold text-gray-900">Grundpflege</dt>
          <dd class="mt-1 text-gray-600">
            Wir bieten grundpflegerische Versorgung, inklusive aktivierender Pflege, Ganz- und Teilwaschungen, An- und
            Auskleiden, Unterstützung bei der Nahrungsaufnahme und Mobilität. Wir respektieren Ihre Intimsphäre und
            ermöglichen auf Wunsch einen begrenzten Mitarbeiterkreis. Durch vertrauensvolle Beziehungen schaffen wir
            eine angenehme Pflegeatmosphäre und bieten unsere Dienste je nach Bedarf auch mehrmals täglich, am
            Wochenende und an Feiertagen an.
          </dd>
        </div>

        <div>
          <dt class="font-semibold text-gray-900">Behandlungspflege</dt>
          <dd class="mt-1 text-gray-600">
            Unser ambulanter Pflegedienst bietet Behandlungspflege, wie die Ausgabe von Medikamenten, Messung von
            Blutdruck oder Blutzuckerkontrolle, sowie Wundversorgung einschließlich Kompressionsstrümpfen, Verbänden,
            Einreiben von Cremes und Injektionen, auf Verordnung Ihres Hausarztes an. Die Kosten dieser Leistungen
            werden von Ihrer zuständigen Krankenkasse übernommen.
          </dd>
        </div>

        <div>
          <dt class="font-semibold text-gray-900">OP-Nachsorge</dt>
          <dd class="mt-1 text-gray-600">Nach Ihrer Entlassung aus dem Krankenhaus kümmern wir uns um Ihre Behandlung,
            um sicherzustellen, dass Sie so schnell wie möglich wieder gesund und fit werden.
          </dd>
        </div>

        <div>
          <dt class="font-semibold text-gray-900">Verhinderungspflege</dt>
          <dd class="mt-1 text-gray-600">
            Unsere Verhinderungspflege ermöglicht pflegenden Personen und Angehörigen eine Auszeit gemäß Paragraph 39
            SGB XI, beispielsweise bei wichtigen Terminen, Krankheit oder Urlaub. Wir übernehmen während dieser Zeit die
            vollständige Versorgung wunschgemäß stundenweise über das Jahr verteilt oder bis zu 6 Wochen am Stück. Die
            Verhinderungspflege kann alle Leistungen der Pflegeversicherung enthalten. Gerne beraten wir Sie individuell
            bezüglich Ihrer Ansprüche und erstellen eine passgenaue Berechnung.
          </dd>
        </div>

        <div>
          <dt class="font-semibold text-gray-900">Hausnotruf</dt>
          <dd class="mt-1 text-gray-600">
            Möchten Sie sorgenfrei und mit bestem Gewissen leben? Wir richten auf Wunsch für Sie einen Hausnotruf ein,
            der über verschiedene Wege wie einen Knopfdruck an einem Arm- oder Halsband aktiviert werden kann. Bei
            Betätigung wird ein Notrufsignal bei unserem Pflegedienst/Rettungsdienst oder bei Nachbarn und Angehörigen
            ausgelöst, um schnellstmöglich Hilfe herbeizurufen. Das Hausnotrufsystem bietet höchste Sicherheit,
            besonders wenn Sie häufig längere Zeit allein zu Hause sind. Die Kosten für die notwendigen Geräte werden in
            der Regel von der Pflegekasse übernommen.
          </dd>
        </div>

        <div>
          <dt class="font-semibold text-gray-900">Diabetes-Schwerpunkt</dt>
          <dd class="mt-1 text-gray-600">
            Wir unterstützen Sie bei der Behandlung und Versorgung von Diabetes, unabhängig von der Art der Erkrankung,
            einschließlich Diabetes mellitus und dem diabetischen Fußsyndrom.
          </dd>
        </div>

        <div>
          <dt class="font-semibold text-gray-900">Palliativversorgung</dt>
          <dd class="mt-1 text-gray-600">
            Unser Ziel ist es, Betroffene und Angehörige in der letzten Phase des Lebens bestmöglich zu unterstützen.
            Wir bieten eine einfühlsame palliative Versorgung in der vertrauten Umgebung, inklusive der Linderung von
            Symptomen und einer Seelsorge für Angehörige. Unsere Pflegekräfte und ein Palliativ-Stützpunkt sind rund um
            die Uhr erreichbar.
          </dd>
        </div>

        <div>
          <dt class="font-semibold text-gray-900">Beratung (§37.3)</dt>
          <dd class="mt-1 text-gray-600">
            Pflegebedürftige, die Pflegegeld beziehen und von Angehörigen betreut werden, müssen regelmäßig einen
            Beratungseinsatz durch einen zugelassenen Pflegedienst durchführen lassen - halbjährlich bei Pflegegraden
            1-3 und vierteljährlich bei Pflegegraden 4-5 - um sicherzustellen, dass die Qualität der häuslichen Pflege
            gewährleistet ist und Fragen zu Themen wie Wohnumfeld, Umbauten, Ernährung und Lagerung geklärt werden
            können.
          </dd>
        </div>

        <div>
          <dt class="font-semibold text-gray-900">Weitere Betreuungs- und Entlastungsleistungen</dt>
          <dd class="mt-1 text-gray-600">
            Wir bieten Ihnen neben Pflegesachleistungen auch Betreuungs- und Entlastungsleistungen an, die bis zu 125
            Euro monatlich betragen können. Hierzu gehören zum Beispiel Haushaltshilfe, Begleitung bei Arztbesuchen oder
            Beschäftigungsmaßnahmen.
          </dd>
        </div>

      </dl>
    </div>
  </div>

  <div class="py-24 sm:py-32">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <h2 class="text-3xl font-bold tracking-tight text-black sm:text-4xl">Unsere Standorte</h2>
      <ul role="list"
          class="mx-auto mt-20 grid max-w-2xl grid-cols-1 gap-6 sm:grid-cols-2 lg:mx-0 lg:max-w-none lg:grid-cols-3 lg:gap-8 text-center text-white">
        <li class="rounded-2xl bg-brand py-10 px-8">
          <img class="mx-auto h-48 w-48 rounded-full md:h-56 md:w-56" src="{{asset('images/buero_gevelsberg.webp')}}"
               alt="">
          <h3 class="mt-6 text-base font-bold leading-7 tracking-tight">Standort Gevelsberg</h3>
          <p class="text-sm leading-6">Berchemallee 99, 58285 Gevelsberg</p>
          <p class="font-semibold mt-6">Einzugsgebiet</p>
          <ul role="list">
            <li>Gevelsberg</li>
            <li>Schmandbruch</li>
            <li>Volmarstein</li>
            <li>Haßlinghausen</li>
          </ul>
        </li>
        <li class="rounded-2xl bg-brand py-10 px-8">
          <img class="mx-auto h-48 w-48 rounded-full md:h-56 md:w-56" src="{{asset('images/buero_hagen.webp')}}" alt="">
          <h3 class="mt-6 text-base font-bold leading-7 tracking-tight">Standort Hagen</h3>
          <p class="text-sm leading-6">Dammstraße 18, 58135 Hagen</p>
          <p class="font-semibold mt-6">Einzugsgebiet</p>
          <ul role="list">
            <li>Hagen-Haspe</li>
            <li>Hagen</li>
          </ul>
        </li>

        <li class="rounded-2xl bg-brand py-10 px-8">
          <img class="mx-auto h-48 w-48 rounded-full md:h-56 md:w-56" src="{{asset('images/buero_ennepetal.webp')}}"
               alt="">
          <h3 class="mt-6 text-base font-bold leading-7 tracking-tight">Standort Ennepetal</h3>
          <p class="text-sm leading-6">Voerder Straße 31, 58256 Ennepetal</p>
          <p class="font-semibold mt-6">Einzugsgebiet</p>
          <ul role="list">
            <li>Ennepetal</li>
            <li>Schwelm</li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
@endsection
