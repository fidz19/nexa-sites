@if ($promos->isNotEmpty())
<section class="py-20 bg-gradient-to-r from-indigo-900 to-purple-900 text-white" id="promo">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-12">
            <div>
                <h3 class="text-primary font-bold tracking-widest uppercase mb-2">Promo</h3>
                <h2 class="text-4xl font-display font-bold">Penawaran Spesial Bulan Ini</h2>
            </div>
            <p class="text-indigo-200 max-w-xl">Dapatkan harga terbaik untuk paket website &amp; aplikasi. Promo dapat berubah kapan saja.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($promos as $promo)
                <div class="p-8 rounded-2xl bg-white/10 border border-white/20 backdrop-blur-sm">
                    @if (data_get($promo, 'badge'))
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-primary/20 text-primary mb-4">{{ data_get($promo, 'badge') }}</span>
                    @endif
                    <h3 class="text-2xl font-bold font-display mb-2">{{ data_get($promo, 'title') }}</h3>
                    @if (data_get($promo, 'subtitle'))
                        <p class="text-indigo-200 mb-3">{{ data_get($promo, 'subtitle') }}</p>
                    @endif
                    @if (data_get($promo, 'description'))
                        <p class="text-indigo-100 text-sm mb-6">{{ data_get($promo, 'description') }}</p>
                    @endif
                    @if (data_get($promo, 'cta_label'))
                        <a class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-primary hover:bg-primary-hover text-white text-sm font-bold transition-colors" href="{{ data_get($promo, 'cta_link', '#contact') }}">
                            {{ data_get($promo, 'cta_label') }}
                            <span class="material-icons-round text-sm">arrow_forward</span>
                        </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
