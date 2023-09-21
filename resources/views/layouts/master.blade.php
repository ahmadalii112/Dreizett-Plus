<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <title>dreizett Plus - Ambulanter Pflegedienst</title>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5646Z85');</script>
    <!-- End Google Tag Manager -->
</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5646Z85"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="bg-white">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="/" class="-m-1.5 p-1.5">
                    <span class="sr-only">dreizett Plus Ambulanter Pflegedienst</span>
                    <img class="h-15 w-auto" src="{{ asset('images/logo.webp') }}" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button"
                    class="mobile-nav-toggler -m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Hauptmenü aufrufen</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-10">
                <a href="/"
                    class="text-sm font-semibold leading-6 text-gray-900 p-3 rounded-md hover:bg-brand hover:text-white">Start</a>

                <a href="/ambulante-pflege"
                    class="text-sm font-semibold leading-6 text-gray-900 p-3 rounded-md hover:bg-brand hover:text-white">Ambulante
                    Pflege</a>

                <a href="/tagespflege"
                    class="text-sm font-semibold leading-6 text-gray-900 p-3 rounded-md hover:bg-brand hover:text-white">Tagespflege</a>

                <a href="https://dreizett-wohngemeinschaft.de/"
                    class="text-sm font-semibold leading-6 text-gray-900 p-3 rounded-md hover:bg-brand hover:text-white">Wohngemeinschaften</a>

                <a href="/team"
                    class="text-sm font-semibold leading-6 text-gray-900 p-3 rounded-md hover:bg-brand hover:text-white">Das Team</a>

                <a href="/karriere"
                    class="text-sm font-semibold leading-6 bg-brand-2 hover:bg-brand-2/80 text-white p-3 rounded-md">Karriere
                    <span aria-hidden="true">&rarr;</span></a>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div id="mobile-menu" class="hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-10"></div>
            <div
                class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                <div class="flex items-center justify-between">
                    <a href="/" class="-m-1.5 p-1.5">
                        <span class="sr-only">dreizett Plus Ambulanter Pflegedienst</span>
                        <img class="h-15 w-auto" src="{{ asset('images/logo.webp') }}" alt="">
                    </a>
                    <button type="button" class="mobile-nav-toggler -m-2.5 rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Menü schließen</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/10">
                        <div class="space-y-2 py-6">
                            <a href="/"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Start</a>

                            <a href="/ambulante-pflege"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Ambulante
                                Pflege</a>

                            <a href="/tagespflege"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Tagespflege</a>

                            <a href="https://dreizett-wohngemeinschaft.de/"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Wohngemeinschaften</a>

                            <a href="/team"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Das Team</a>

                            <a href="/karriere"
                                class="-mx-3 block rounded-lg py-2 px-3 text-base font-semibold leading-7 text-gray-900 hover:bg-gray-50">Karriere</a>
                        </div>
                        <div class="py-6">
                            <a href="https://calendly.com/dreizett-plus/erstgespraech"
                                class="-mx-3 block rounded-lg py-2.5 px-3 text-base font-semibold leading-7 bg-brand-2 text-gray-900 hover:bg-brand-2/80">Zum
                                Erstgespräch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <footer class="bg-black" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="space-y-8">
                    <img class="h-7" src="{{ asset('images/logo.webp') }}" alt="dreizett Plus">
                    <p class="text-sm leading-6 text-gray-300">Wir revolutionieren die Pflege und machen sie für alle
                        Beteiligten ein großes Stück besser.</p>
                    <div class="flex space-x-6">
                        <a href="https://www.facebook.com/dreizettPlusGabrieleLandolfoAmbulantePflege"
                            class="text-gray-500 hover:text-gray-400">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>

                        <a href="https://www.instagram.com/dreizettplus/" class="text-gray-500 hover:text-gray-400">
                            <span class="sr-only">Instagram</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white">Leistungen</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="/ambulante-pflege"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Ambulante Pflege</a>
                                </li>

                                <li>
                                    <a href="/tagespflege"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Tagespflege</a>
                                </li>

                                <li>
                                    <a href="https://dreizett-wohngemeinschaft.de/"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Wohngemeinschaften</a>
                                </li>

                                <li>
                                    <a href="/pflegeschulung"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Schulung pflegender
                                        Angehörige</a>
                                </li>

                                <li>
                                    <a href="https://pflegetuete.de/notrufsysteme"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Hausnotruf</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <h3 class="text-sm font-semibold leading-6 text-white">Wir sind dreizett</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="/team" class="text-sm leading-6 text-gray-300 hover:text-white">Das
                                        Team</a>
                                </li>

                                <li>
                                    <a href="/presse"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Presse</a>
                                </li>

                                <li>
                                    <a href="/karriere"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Karriere</a>
                                </li>

                                <!--<li>
                                    <a href="#"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Partner</a>
                                </li>-->

                                <!--<li>
                                    <a href="#"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Mitarbeiterportal</a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="md:grid md:grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold leading-6 text-white">Rechtliches</h3>
                            <ul role="list" class="mt-6 space-y-4">
                                <li>
                                    <a href="/impressum"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Impressum</a>
                                </li>

                                <li>
                                    <a href="/datenschutz"
                                        class="text-sm leading-6 text-gray-300 hover:text-white">Datenschutz</a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-10 md:mt-0">
                            <img src="{{ asset('images/top_arbeitgeber.webp') }}" alt="dreizett Plus Top Arbeitgeber"
                                title="Wir sind als Top-Arbeitgeber ausgezeichnet" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-16 border-t border-white/10 pt-8 sm:mt-20 lg:mt-24">
                <p class="text-xs leading-5 text-gray-400">&copy; 2023 dreizett Plus Ambulanter Pflegedienst</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
