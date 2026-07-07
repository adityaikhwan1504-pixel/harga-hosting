@extends('layouts.app')

@section('title', 'Harga Hosting & Domain Terbaru')

@section('content')

    {{-- HERO --}}
    <header class="bg-gradient-to-br from-brand-700 via-brand-600 to-brand-500 bg-grid">
        <div class="max-w-6xl mx-auto px-6 pt-16 pb-24 text-center text-white">
            <span class="inline-block bg-white/15 text-white text-xs font-semibold tracking-wide uppercase px-4 py-1.5 rounded-full mb-5">
                Perbandingan Harga 2026
            </span>
            <h1 class="text-3xl md:text-5xl font-extrabold leading-tight max-w-3xl mx-auto">
                Harga Hosting & Domain, Transparan dari Awal
            </h1>
            <p class="mt-4 text-brand-100 max-w-xl mx-auto text-base md:text-lg">
                Bandingkan paket hosting dan ekstensi domain populer untuk Indonesia
                — lengkap dengan opsi harga bulanan maupun tahunan.
            </p>

            {{-- Toggle bulanan / tahunan --}}
            <div class="mt-8 inline-flex items-center bg-white/10 border border-white/20 rounded-full p-1">
                <button type="button" data-period="month"
                        class="period-btn active-period px-5 py-2 rounded-full text-sm font-semibold transition">
                    1 Bulan
                </button>
                <button type="button" data-period="year"
                        class="period-btn px-5 py-2 rounded-full text-sm font-semibold transition text-white/80">
                    12 Bulan
                </button>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 -mt-14 pb-20">

        {{-- HOSTING CARDS --}}
        <section id="hosting" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach ($hostingPlans as $plan)
                <div class="relative bg-white rounded-2xl shadow-lg border {{ $plan['popular'] ? 'border-brand-400 ring-2 ring-brand-300' : 'border-slate-200' }} p-6 flex flex-col">
                    @if ($plan['popular'])
                        <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-brand-500 text-white text-xs font-bold tracking-wide px-3 py-1 rounded-full shadow">
                            TERPOPULER
                        </span>
                    @endif

                    {{-- Badge diskon: hanya tampil di mode Tahunan (12 bulan) --}}
                    <span class="inline-block self-start bg-rose-100 text-rose-600 text-xs font-bold px-2.5 py-1 rounded-md mb-3 discount-badge hidden">
                        Diskon {{ $plan['discount'] }}
                    </span>

                    <h3 class="text-lg font-bold text-slate-900">{{ $plan['name'] }}</h3>
                    <p class="text-sm text-slate-500 mt-1 mb-5 min-h-[2.5rem]">{{ $plan['tagline'] }}</p>

                    {{-- Harga normal (dicoret) - hanya tampil di mode Tahunan --}}
                    <div class="mb-1 price-normal-wrap hidden">
                        <span class="text-sm text-slate-400 line-through">
                            Rp{{ number_format($plan['year']['price_normal_month'], 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="flex items-baseline gap-1 mb-1">
                        <span class="text-3xl font-extrabold text-slate-900" data-price
                              data-month="Rp{{ number_format($plan['month']['price'], 0, ',', '.') }}"
                              data-year="Rp{{ number_format($plan['year']['price_promo_month'], 0, ',', '.') }}">
                            Rp{{ number_format($plan['month']['price'], 0, ',', '.') }}
                        </span>
                        <span class="text-slate-500 text-sm">/bln</span>
                    </div>

                    <div class="mb-4 min-h-[1.25rem]"></div>

                    <a href="{{ $affiliateUrl }}" target="_blank" rel="noopener sponsored"
                       class="text-center w-full bg-brand-500 hover:bg-brand-600 text-white font-semibold rounded-xl py-2.5 transition {{ $plan['popular'] ? '' : 'bg-white border border-brand-400 !text-brand-600 hover:!bg-brand-50' }}">
                        Pilih paket
                    </a>

                    {{-- Keterangan biaya di bawah tombol --}}
                    <p class="text-xs text-slate-400 mt-3 leading-relaxed" data-caption
                       data-month="Biaya perpanjangan Rp{{ number_format($plan['month']['renewal'], 0, ',', '.') }}/bln."
                       data-year="Beli paket 12 bulan seharga Rp{{ number_format($plan['year']['total_promo'], 0, ',', '.') }} (harga normal Rp{{ number_format($plan['year']['total_normal'], 0, ',', '.') }}). Biaya perpanjangan Rp{{ number_format($plan['year']['renewal_month'], 0, ',', '.') }}/bln.">
                        Biaya perpanjangan Rp{{ number_format($plan['month']['renewal'], 0, ',', '.') }}/bln.
                    </p>

                    <hr class="my-5 border-slate-100">

                    <ul class="space-y-2.5 text-sm text-slate-600 flex-1">
                        @foreach ($plan['features'] as $feature)
                            <li class="flex items-start gap-2">
                                <svg class="w-4 h-4 text-brand-500 mt-0.5 shrink-0" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.7 5.3a1 1 0 010 1.4l-7.4 7.4a1 1 0 01-1.4 0L3.3 9.5a1 1 0 111.4-1.4l3.9 3.9 6.7-6.7a1 1 0 011.4 0z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $feature }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </section>

        <p class="text-center text-xs text-slate-400 mt-4">
            Harga belum termasuk pajak. Harga promo berlaku untuk periode langganan panjang, biaya perpanjangan mengikuti harga normal.
        </p>

        {{-- DOMAIN TABLE --}}
        <section id="domain" class="mt-20">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900">Harga Domain Populer</h2>
                <p class="text-slate-500 mt-2">Amankan alamat website Anda dengan ekstensi paling sesuai kebutuhan.</p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">
                <table class="w-full text-left">
                    <thead class="bg-slate-900 text-white text-sm">
                        <tr>
                            <th class="px-6 py-4 font-semibold">Ekstensi</th>
                            <th class="px-6 py-4 font-semibold hidden md:table-cell">Keterangan</th>
                            <th class="px-6 py-4 font-semibold text-right">Harga</th>
                            <th class="px-6 py-4 font-semibold text-right hidden sm:table-cell"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @foreach ($domains as $domain)
                            <tr class="hover:bg-slate-50 transition">
                                <td class="px-6 py-5">
                                    <span class="font-bold text-brand-600 text-base">{{ $domain['tld'] }}</span>
                                    @if ($domain['requires_doc'])
                                        <span class="block mt-1 text-[11px] text-amber-600 bg-amber-50 inline-block px-2 py-0.5 rounded-full">
                                            Perlu dokumen legalitas
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-slate-500 hidden md:table-cell">{{ $domain['description'] }}</td>
                                <td class="px-6 py-5 text-right">
                                    <div class="font-bold text-slate-900" data-domain-price
                                         data-month="Rp{{ number_format($domain['price_month'], 0, ',', '.') }}"
                                         data-year="Rp{{ number_format($domain['price_year_promo'] ?? $domain['price_year'], 0, ',', '.') }}">
                                        Rp{{ number_format($domain['price_month'], 0, ',', '.') }}
                                    </div>
                                    <div class="text-xs text-slate-400" data-domain-suffix>/bulan (estimasi)</div>
                                    @isset($domain['price_year_promo'])
                                        <div class="text-xs text-slate-400 mt-0.5">
                                            Normal Rp{{ number_format($domain['price_year'], 0, ',', '.') }}/tahun
                                        </div>
                                    @endisset
                                </td>
                                <td class="px-6 py-5 text-right hidden sm:table-cell">
                                    <a href="{{ $affiliateUrl }}" target="_blank" rel="noopener sponsored"
                                       class="inline-block bg-slate-900 hover:bg-brand-600 text-white text-xs font-semibold rounded-lg px-4 py-2 transition">
                                        Cek Domain
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <p class="text-center text-xs text-slate-400 mt-4">
                Harga domain per tahun; kolom bulanan adalah estimasi (harga tahunan ÷ 12) karena domain umumnya hanya dijual per tahun. Domain .co.id membutuhkan dokumen legalitas badan usaha.
            </p>
        </section>

        {{-- CTA BAWAH --}}
        <section class="mt-20 bg-slate-900 rounded-3xl px-8 py-14 text-center text-white">
            <h2 class="text-2xl md:text-3xl font-extrabold">Siap membangun website Anda?</h2>
            <p class="text-slate-300 mt-3 max-w-xl mx-auto">
                Dapatkan hosting cepat dan domain gratis 1 tahun untuk paket tahunan pilihan Anda.
            </p>
            <a href="{{ $affiliateUrl }}" target="_blank" rel="noopener sponsored"
               class="inline-block mt-6 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-xl px-8 py-3 transition">
                Lihat Semua Paket di Hostinger
            </a>
        </section>
    </main>

    <script>
        (function () {
            const buttons = document.querySelectorAll('.period-btn');
            const priceEls = document.querySelectorAll('[data-price]');
            const captionEls = document.querySelectorAll('[data-caption]');
            const discountBadges = document.querySelectorAll('.discount-badge');
            const normalPriceWraps = document.querySelectorAll('.price-normal-wrap');
            const domainPriceEls = document.querySelectorAll('[data-domain-price]');
            const domainSuffixEls = document.querySelectorAll('[data-domain-suffix]');

            function setPeriod(period) {
                buttons.forEach(btn => {
                    const active = btn.dataset.period === period;
                    btn.classList.toggle('active-period', active);
                    btn.classList.toggle('text-white/80', !active);
                });

                priceEls.forEach(el => {
                    el.textContent = el.dataset[period];
                });

                captionEls.forEach(el => {
                    el.textContent = el.dataset[period];
                });

                discountBadges.forEach(el => {
                    el.classList.toggle('hidden', period !== 'year');
                });

                normalPriceWraps.forEach(el => {
                    el.classList.toggle('hidden', period !== 'year');
                });

                domainPriceEls.forEach(el => {
                    el.textContent = el.dataset[period];
                });

                domainSuffixEls.forEach(el => {
                    el.textContent = period === 'month' ? '/bulan (estimasi)' : '/tahun';
                });
            }

            buttons.forEach(btn => {
                btn.addEventListener('click', () => setPeriod(btn.dataset.period));
            });
        })();
    </script>

    <style>
        .active-period {
            background: white;
            color: #45259c;
        }
    </style>
@endsection
