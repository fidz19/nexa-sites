<header class="relative min-h-screen flex items-center justify-center overflow-hidden" id="home">
    <div class="absolute inset-0 bg-hero-pattern bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-background-dark/80 dark:bg-background-dark/90 gradient-overlay"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-accent-purple/30 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-primary/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
    <div class="relative container mx-auto px-6 text-center z-10 pt-20">
        <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-primary text-sm font-semibold mb-6 tracking-wider backdrop-blur-sm">SEJAK 2025</span>
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-display font-bold text-white leading-tight mb-4">
            Tingkatkan Bisnis Anda<br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-yellow-400 glow-text">dengan Nexa Site</span>
        </h1>
        <p class="text-gray-300 text-lg md:text-xl max-w-2xl mx-auto mb-10 font-light">
            Kami membangun website dan aplikasi berkinerja tinggi yang dirancang untuk mengembangkan bisnis Anda di era digital.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a class="group relative px-8 py-4 bg-transparent border border-white/30 text-white font-semibold rounded-full overflow-hidden hover:border-primary transition-colors" href="#services">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/10 to-transparent -translate-x-full group-hover:animate-[shimmer_1.5s_infinite]"></span>
                JELAJAHI LAYANAN
            </a>
            <a class="px-8 py-4 bg-primary text-white font-semibold rounded-full hover:bg-primary-hover transition-colors shadow-lg shadow-orange-500/30 flex items-center justify-center gap-2" href="#contact">
                KONSULTASI GRATIS
                <span class="material-icons-round text-sm">arrow_forward</span>
            </a>
        </div>
    </div>
    @if ($promos->isNotEmpty())
        @php
            $promo = $promos->first();
        @endphp
        <div class="absolute bottom-6 right-6 z-20 w-full max-w-sm" data-promo-popup>
            <div class="rounded-2xl border border-white/15 bg-white/10 backdrop-blur-xl text-white shadow-2xl">
                <div class="flex items-start justify-between gap-4 p-5">
                    <div>
                        @if (data_get($promo, 'badge'))
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-primary/20 text-primary mb-3">
                                {{ data_get($promo, 'badge') }}
                            </span>
                        @endif
                        <h3 class="text-lg font-display font-bold">{{ data_get($promo, 'title') }}</h3>
                        @if (data_get($promo, 'subtitle'))
                            <p class="text-sm text-white/80 mt-1">{{ data_get($promo, 'subtitle') }}</p>
                        @endif
                        @if (data_get($promo, 'description'))
                            <p class="text-xs text-white/70 mt-2">{{ data_get($promo, 'description') }}</p>
                        @endif
                    </div>
                    <button type="button" class="text-white/70 hover:text-white" data-promo-close>
                        <span class="material-icons-round text-lg">close</span>
                    </button>
                </div>
                @if (data_get($promo, 'cta_label'))
                    <div class="px-5 pb-5">
                        <a class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-primary hover:bg-primary-hover text-white text-sm font-bold transition-colors" href="{{ data_get($promo, 'cta_link', '#contact') }}">
                            {{ data_get($promo, 'cta_label') }}
                            <span class="material-icons-round text-sm">arrow_forward</span>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <script>
            (function () {
                const popup = document.querySelector('[data-promo-popup]');
                const closeButton = popup?.querySelector('[data-promo-close]');
                if (!popup || !closeButton) {
                    return;
                }
                closeButton.addEventListener('click', () => {
                    popup.remove();
                });
            })();
        </script>
    @endif
    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
        <span class="material-icons-round text-white/50 text-4xl">keyboard_arrow_down</span>
    </div>
</header>
