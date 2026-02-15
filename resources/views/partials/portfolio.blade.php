<section class="relative py-24 bg-surface-light dark:bg-background-light clip-diagonal-top -mt-20 pt-32" id="portfolio">
    <div class="container mx-auto px-6 text-center">
        <h3 class="text-accent-purple font-bold tracking-widest uppercase mb-2">Kepercayaan</h3>
        <h2 class="text-4xl font-display font-bold text-gray-900 mb-12">Klien Terpercaya Kami</h2>
            
        <div class="mt-16 max-w-5xl mx-auto" data-slider-wrapper>
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-display font-bold text-gray-900">Portofolio Proyek</h3>
                <div class="flex items-center gap-2">
                    <button type="button" class="p-2 rounded-full border border-gray-300 text-gray-600 hover:text-primary hover:border-primary transition-colors" data-slider-prev>
                        <span class="material-icons-round text-lg">chevron_left</span>
                    </button>
                    <button type="button" class="p-2 rounded-full border border-gray-300 text-gray-600 hover:text-primary hover:border-primary transition-colors" data-slider-next>
                        <span class="material-icons-round text-lg">chevron_right</span>
                    </button>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-2xl border border-gray-200 shadow-2xl bg-white" data-slider>
                <div class="flex transition-transform duration-500 ease-in-out" data-slider-track style="transform: translateX(0%);">
                    @foreach ($portfolioProjects as $project)
                        <div class="w-full shrink-0" data-slide>
                            @php
                                $imagePath = data_get($project, 'image_path');
                                $imageUrl = $imagePath
                                    ? \Illuminate\Support\Facades\Storage::url($imagePath)
                                    : data_get($project, 'image_url');
                            @endphp
                            @if (data_get($project, 'project_url'))
                                @php
                                    $projectUrl = data_get($project, 'project_url');
                                    $projectHref = str_starts_with((string) $projectUrl, 'http')
                                        ? $projectUrl
                                        : 'https://' . $projectUrl;
                                @endphp
                                <a href="{{ $projectHref }}" target="_blank" rel="noreferrer">
                                    <img alt="{{ data_get($project, 'title', 'Portofolio Proyek') }}" class="w-full object-cover" src="{{ $imageUrl }}"/>
                                </a>
                            @else
                                <img alt="{{ data_get($project, 'title', 'Portofolio Proyek') }}" class="w-full object-cover" src="{{ $imageUrl }}"/>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <p class="text-sm text-gray-500 mt-4">Geser dengan tombol panah untuk melihat proyek lainnya.</p>
        </div>
        <script>
            (function () {
                const wrapper = document.currentScript?.closest('[data-slider-wrapper]');
                const slider = wrapper?.querySelector('[data-slider]') || document.querySelector('[data-slider]');
                if (!slider) return;
                const track = slider.querySelector('[data-slider-track]');
                const slides = Array.from(slider.querySelectorAll('[data-slide]'));
                const prev = wrapper?.querySelector('[data-slider-prev]');
                const next = wrapper?.querySelector('[data-slider-next]');
                if (!track || slides.length === 0) return;
                let index = 0;
                const update = () => {
                    track.style.transform = `translateX(-${index * 100}%)`;
                };
                prev?.addEventListener('click', () => {
                    index = (index - 1 + slides.length) % slides.length;
                    update();
                });
                next?.addEventListener('click', () => {
                    index = (index + 1) % slides.length;
                    update();
                });
            })();
        </script>
    </div>
</section>
