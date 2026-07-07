<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Harga Hosting & Domain')</title>
    <meta name="description" content="Daftar harga hosting dan domain terbaru — bandingkan paket bulanan dan tahunan.">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50:  '#f2effd',
                            100: '#e5dcfb',
                            200: '#c6b6f6',
                            300: '#a48ef0',
                            400: '#8768ea',
                            500: '#673de6',
                            600: '#5730c4',
                            700: '#45259c',
                            800: '#331c74',
                            900: '#22134d',
                        },
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .bg-grid {
            background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.15) 1px, transparent 0);
            background-size: 24px 24px;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
    @yield('content')

    <footer class="border-t border-slate-200 bg-white">
        <div class="max-w-6xl mx-auto px-6 py-8 text-sm text-slate-500 flex flex-col md:flex-row items-center justify-between gap-3">
            <p>&copy; {{ date('Y') }} Harga Hosting & Domain. Dibuat dengan Laravel.</p>
            <p>Harga hosting mengacu pada Hostinger &middot; belum termasuk pajak &middot; dapat berubah sewaktu-waktu.</p>
        </div>
    </footer>
</body>
</html>
