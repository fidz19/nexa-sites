<?php

namespace App\Http\Controllers;

use App\Models\PortfolioProject;
use App\Models\PricingPlan;
use App\Models\Promo;
use Illuminate\Support\Carbon;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        $pricingPlans = PricingPlan::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        if ($pricingPlans->isEmpty()) {
            $pricingPlans = collect([
                [
                    'name' => 'Dasar',
                    'description' => 'Cocok untuk blog pribadi atau landing page sederhana.',
                    'price' => 4_999_000,
                    'price_unit' => 'proyek',
                    'features' => [
                        'Website 1 Halaman',
                        'Setup SEO Dasar',
                        'Responsive Mobile',
                    ],
                    'cta_label' => 'Pilih Dasar',
                    'cta_link' => '#contact',
                    'is_featured' => false,
                ],
                [
                    'name' => 'Profesional',
                    'description' => 'Ideal untuk bisnis kecil yang ingin bertumbuh.',
                    'price' => 12_999_000,
                    'price_unit' => 'proyek',
                    'features' => [
                        'Website 5 Halaman',
                        'Aplikasi Web Sederhana',
                        'Optimasi SEO',
                        'Maintenance 1 Bulan',
                    ],
                    'cta_label' => 'Pilih Profesional',
                    'cta_link' => '#contact',
                    'is_featured' => false,
                ],
                [
                    'name' => 'Bisnis',
                    'description' => 'Terbaik untuk perusahaan yang sedang scale up.',
                    'price' => 24_999_000,
                    'price_unit' => 'proyek',
                    'features' => [
                        'Website 10 Halaman',
                        'Integrasi E-commerce',
                        'Aplikasi Web / Mobile',
                        'Maintenance 3 Bulan',
                    ],
                    'cta_label' => 'Pilih Bisnis',
                    'cta_link' => '#contact',
                    'badge' => 'Paling Populer',
                    'is_featured' => true,
                ],
                [
                    'name' => 'Korporat',
                    'description' => 'Solusi khusus untuk skala besar dan aplikasi kompleks.',
                    'price_label' => 'Kustom',
                    'features' => [
                        'Halaman Tanpa Batas',
                        'Fitur Kustom',
                        'Dukungan Prioritas',
                        'Setup Server Dedicated',
                    ],
                    'cta_label' => 'Hubungi Sales',
                    'cta_link' => '#contact',
                    'is_featured' => false,
                ],
            ])->map(fn (array $item) => (object) $item);
        }

        $promos = Promo::query()
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('starts_at')
                    ->orWhere('starts_at', '<=', Carbon::now());
            })
            ->where(function ($query) {
                $query->whereNull('ends_at')
                    ->orWhere('ends_at', '>=', Carbon::now());
            })
            ->orderBy('sort_order')
            ->get();

        $portfolioProjects = PortfolioProject::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        if ($portfolioProjects->isEmpty()) {
            $portfolioProjects = collect([
                [
                    'title' => 'Dashboard Aplikasi CRM',
                    'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAagPrP4Tc0fnJhcjlt2PkCKPpgrqkUMUppGwLnKGmOMq47H5QxTbgUVljsQ6o-MHoBUKun9IAkv1JLztHOZr50duwKYoVMVZWEm8c36OmgbxkjVMfKSce00h2fUmIQYzo8Fza18Sovt4jx5KM9pPZoxQAvCI8R323EOcLHmMFlrlKaLo5_iIuCgToFlvOSY7MeWBijcPtXpjZMbB8iN_ySGWgt8TzvasPUBIrkSPu3-LMIUeEILWaOUlhehJj0MNen2Pdsw6vvTsw',
                ],
                [
                    'title' => 'Dashboard Aplikasi Keuangan',
                    'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCechc-4Pvk8qkhyzLRcqj3xE0dNOd7vAIDoOK38edTnouhiEHbSBS1anPz9RhT2VvCRH7dhkcQYhG4A6Q4BzGJJMdAWPg8ZZqTDmacROxixamDhWUG4DO_Yt89jlNWk9FuE7K9P9W24nVjM53yf2asFnstZ1BoVASEs33GM3JOYHWvavesuaXDJpVG1Qb83dQdxChiHyz3SwnNgyQi7-_RG8dwvwzLgvORCilRy8CmQQ_BbdmBgZppmdFKi1yA58GGUmtra_oSRjw',
                ],
                [
                    'title' => 'Landing Page Produk',
                    'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCCo_S1rhD42ffuhOt54NF2ufE1n7OlNV_dL84U8kbCdWijUuSDYzOYlKxqma-eMbgSKVehjfKyP_sSKQeYzcfvv0ZPCcpx7UM8QzBYvekZZ812rrNVSdloO0UFC6un9vDQJeHbBRqlU8oBJdpE16wSxWJaNdjH1nHuo73zQSxyNFP3pTm1pxbKVd5LB5pupYKRNb2z6wJqo3Iwb2rqETmx_WmgT1dI8RSg3J7b9_yCNguvagbxHHHhkBzG_5F0cojvLqDTDCo5yF4',
                ],
            ])->map(fn (array $item) => (object) $item);
        }

        return view('welcome', [
            'pricingPlans' => $pricingPlans,
            'promos' => $promos,
            'portfolioProjects' => $portfolioProjects,
        ]);
    }
}
