<?php

namespace App\Http\Controllers;

class PricingController extends Controller
{
    /**
     * Tautan afiliasi Hostinger (dipakai di semua tombol CTA).
     */
    protected string $affiliateUrl = 'https://www.hostinger.com/id?utm_medium=affiliate&utm_source=aff187244&utm_campaign=816&session=1027ef653150a4fc12c2a9b0d819e2';

    public function index()
    {
        // Data diambil langsung dari hostinger.com/id/harga#compare-table
        // - "month" = tampilan saat durasi langganan "1 bulan" dipilih (tanpa diskon)
        // - "year"  = tampilan saat durasi langganan "12 bulan" dipilih (dengan diskon)
        $hostingPlans = [
            [
                'key'      => 'single',
                'name'     => 'Single',
                'tagline'  => 'Cocok untuk entrepreneur',
                'popular'  => false,
                'discount' => '69%',
                'month' => [
                    'price'   => 89900,   // Rp89.900/bln (1 bulan)
                    'renewal' => 89900,   // biaya perpanjangan Rp89.900/bln
                ],
                'year' => [
                    'price_normal_month' => 89900,    // harga normal (dicoret)
                    'price_promo_month'  => 27900,    // Rp27.900/bln
                    'total_promo'        => 334800,   // beli paket 12 bulan seharga
                    'total_normal'       => 1078800,  // harga normal 12 bulan
                    'renewal_month'      => 54900,    // biaya perpanjangan/bln
                ],
                'features' => [
                    'Buat 1 website',
                    '10 GB SSD storage',
                    '1 mailbox per website (gratis 1 tahun)',
                    'SSL gratis & backup mingguan',
                    'Migrasi situs gratis',
                ],
            ],
            [
                'key'      => 'premium',
                'name'     => 'Premium',
                'tagline'  => 'Segala yang dibutuhkan untuk membangun website',
                'popular'  => true,
                'discount' => '64%',
                'month' => [
                    'price'   => 109900,
                    'renewal' => 109900,
                ],
                'year' => [
                    'price_normal_month' => 109900,
                    'price_promo_month'  => 39900,
                    'total_promo'        => 478800,
                    'total_normal'       => 1318800,
                    'renewal_month'      => 84900,
                ],
                'features' => [
                    'Hingga 3 website',
                    '20 GB SSD storage',
                    '2 mailbox per website (gratis 1 tahun)',
                    'Domain gratis 1 tahun',
                    'Email marketing gratis 1 tahun',
                ],
            ],
            [
                'key'      => 'business',
                'name'     => 'Business',
                'tagline'  => 'Lebih banyak tool & resource untuk berkembang',
                'popular'  => false,
                'discount' => '54%',
                'month' => [
                    'price'   => 129900,
                    'renewal' => 129900,
                ],
                'year' => [
                    'price_normal_month' => 129900,
                    'price_promo_month'  => 59900,
                    'total_promo'        => 718800,
                    'total_normal'       => 1558800,
                    'renewal_month'      => 121900,
                ],
                'features' => [
                    'Hingga 50 website',
                    '50 GB NVMe storage tercepat',
                    '5 mailbox per website (gratis 1 tahun)',
                    'Backup harian otomatis',
                    'AI agent untuk WordPress',
                ],
            ],
            [
                'key'      => 'cloud_startup',
                'name'     => 'Cloud Startup',
                'tagline'  => 'Resource 20x lebih besar dengan Cloud Hosting',
                'popular'  => false,
                'discount' => '53%',
                'month' => [
                    'price'   => 329900,
                    'renewal' => 329900,
                ],
                'year' => [
                    'price_normal_month' => 329900,
                    'price_promo_month'  => 155900,
                    'total_promo'        => 1870800,
                    'total_normal'       => 3958800,
                    'renewal_month'      => 310900,
                ],
                'features' => [
                    'Hingga 100 website',
                    '100 GB NVMe storage tercepat',
                    'IP dedicated & 4 GB RAM',
                    'Bantuan prioritas 24/7',
                    '10 aplikasi web Node.js',
                ],
            ],
        ];

        $domains = [
            [
                'tld'          => '.co.id',
                'description'  => 'Untuk badan usaha resmi (PT/CV) yang beroperasi di Indonesia',
                'price_year'   => 275000,
                'requires_doc' => true,
            ],
            [
                'tld'          => '.com',
                'description'  => 'Ekstensi paling populer & universal untuk bisnis apa pun',
                'price_year_promo' => 6900,
                'price_year'   => 209900,
                'requires_doc' => false,
            ],
            [
                'tld'          => '.id',
                'description'  => 'Identitas resmi Indonesia, dikelola oleh PANDI',
                'price_year_promo' => 210900,
                'price_year'   => 252900,
                'requires_doc' => false,
            ],
            [
                'tld'          => '.net',
                'description'  => 'Alternatif klasik, cocok untuk perusahaan teknologi & jaringan',
                'price_year'   => 223000,
                'requires_doc' => false,
            ],
            [
                'tld'          => '.biz',
                'description'  => 'Didesain khusus untuk keperluan bisnis',
                'price_year'   => 234000,
                'requires_doc' => false,
            ],
        ];

        foreach ($domains as &$domain) {
            $base = $domain['price_year_promo'] ?? $domain['price_year'];
            $domain['price_month'] = (int) round($base / 12);
        }
        unset($domain);

        return view('pricing.index', [
            'hostingPlans'  => $hostingPlans,
            'domains'       => $domains,
            'affiliateUrl'  => $this->affiliateUrl,
        ]);
    }
}
