<section class="relative py-24 bg-background-light dark:bg-background-dark clip-diagonal-top -mt-20 pt-32 pb-32" id="pricing">
    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <h3 class="text-primary font-bold tracking-widest uppercase mb-2">Paket Harga</h3>
            <h2 class="text-4xl font-display font-bold text-gray-900 dark:text-white">Pilih Paket Terbaik<br/>Untuk Bisnis Anda</h2>
            <div class="w-24 h-1 bg-primary mx-auto mt-4 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 items-start">
            @foreach ($pricingPlans as $plan)
                @php
                    $isFeatured = (bool) data_get($plan, 'is_featured', false);
                    $price = data_get($plan, 'price');
                    $priceLabel = data_get($plan, 'price_label');
                    $priceUnit = data_get($plan, 'price_unit', 'proyek');
                    $badge = data_get($plan, 'badge');
                    $ctaLabel = data_get($plan, 'cta_label', 'Pilih Paket');
                    $ctaLink = data_get($plan, 'cta_link', '#contact');
                    $features = collect(data_get($plan, 'features', []))
                        ->map(function ($item) {
                            if (is_array($item)) {
                                return data_get($item, 'feature');
                            }

                            return $item;
                        })
                        ->filter();
                @endphp
                <div class="{{ $isFeatured ? 'relative p-8 rounded-2xl bg-white dark:bg-surface-dark border-2 border-accent-purple shadow-2xl shadow-purple-500/20 transform md:scale-105 z-10 flex flex-col h-full' : 'relative p-8 rounded-2xl bg-white dark:bg-surface-dark border border-gray-200 dark:border-gray-800 hover:border-primary/50 transition-all duration-300 flex flex-col h-full shadow-sm hover:shadow-xl' }}">
                    <div class="mb-4">
                        <div class="flex items-center justify-between gap-3">
                            <h3 class="text-xl font-bold font-display {{ $isFeatured ? 'text-accent-purple' : 'text-gray-900 dark:text-white' }}">{{ data_get($plan, 'name') }}</h3>
                            @if ($badge)
                                <span class="{{ $isFeatured ? 'bg-accent-purple text-white' : 'bg-gray-100 text-gray-700' }} inline-flex items-center rounded-full px-3 py-1 text-xs font-bold tracking-wide whitespace-nowrap">{{ $badge }}</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2 min-h-[40px]">{{ data_get($plan, 'description') }}</p>
                    </div>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-gray-900 dark:text-white">
                            @if ($price !== null)
                                Rp {{ number_format((int) $price, 0, ',', '.') }}
                            @else
                                {{ $priceLabel ?: 'Kustom' }}
                            @endif
                        </span>
                        @if ($price !== null)
                            <span class="text-sm text-gray-500">/{{ $priceUnit }}</span>
                        @endif
                    </div>
                    <ul class="space-y-4 mb-8 flex-grow">
                        @foreach ($features as $feature)
                            <li class="flex items-start gap-3 text-sm text-gray-600 dark:text-gray-300">
                                <span class="material-icons-round {{ $isFeatured ? 'text-accent-purple' : 'text-green-500' }} text-lg">check_circle</span>
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                    <a class="{{ $isFeatured ? 'w-full py-3 px-6 bg-accent-purple hover:bg-accent-purple-light text-white rounded-xl font-bold text-center transition-colors shadow-lg shadow-purple-500/30 block' : ($price === null ? 'w-full py-3 px-6 border border-gray-300 dark:border-gray-700 text-gray-700 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-800 rounded-xl font-bold text-center transition-colors block' : 'w-full py-3 px-6 border border-primary text-primary hover:bg-primary hover:text-white rounded-xl font-bold text-center transition-colors block') }}" href="{{ $ctaLink }}">{{ $ctaLabel }}</a>
                </div>
            @endforeach
        </div>
    </div>
</section>
