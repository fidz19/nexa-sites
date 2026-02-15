<nav class="fixed w-full z-50 transition-all duration-300 bg-background-dark/90 backdrop-blur-md border-b border-gray-800" data-nav>
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="material-icons-round text-primary text-3xl">code</span>
            <span class="text-2xl font-display font-bold text-white tracking-wide">NEXA<span class="text-primary">SITES</span></span>
        </div>
        <div class="hidden md:flex items-center space-x-8">
            <a class="text-sm font-medium text-white hover:text-primary transition-colors" href="#home">BERANDA</a>
            <a class="text-sm font-medium text-gray-300 hover:text-primary transition-colors" href="#services">LAYANAN</a>
            <a class="text-sm font-medium text-gray-300 hover:text-primary transition-colors" href="#pricing">HARGA</a>
            <a class="text-sm font-medium text-gray-300 hover:text-primary transition-colors" href="#portfolio">PORTOFOLIO</a>
            <a class="bg-primary hover:bg-primary-hover text-white px-6 py-2 rounded-full text-sm font-bold transition-all shadow-lg shadow-orange-500/20" href="#contact">KONTAK</a>
        </div>
        <button aria-controls="mobile-menu" aria-expanded="false" class="md:hidden text-white" data-nav-toggle type="button">
            <span class="material-icons-round text-3xl">menu</span>
        </button>
    </div>
    <div class="hidden md:hidden border-t border-gray-800/80 bg-background-dark/95" data-nav-menu id="mobile-menu">
        <div class="container mx-auto px-6 py-4 flex flex-col gap-3">
            <a class="text-sm font-medium text-white hover:text-primary transition-colors" href="#home">BERANDA</a>
            <a class="text-sm font-medium text-gray-300 hover:text-primary transition-colors" href="#services">LAYANAN</a>
            <a class="text-sm font-medium text-gray-300 hover:text-primary transition-colors" href="#pricing">HARGA</a>
            <a class="text-sm font-medium text-gray-300 hover:text-primary transition-colors" href="#portfolio">PORTOFOLIO</a>
            <a class="bg-primary hover:bg-primary-hover text-white px-5 py-2 rounded-full text-sm font-bold transition-colors w-max" href="#contact">KONTAK</a>
        </div>
    </div>
</nav>
<script>
    (function () {
        const nav = document.querySelector('[data-nav]');
        const toggle = nav?.querySelector('[data-nav-toggle]');
        const menu = nav?.querySelector('[data-nav-menu]');

        if (!nav || !toggle || !menu) {
            return;
        }

        const closeMenu = () => {
            menu.classList.add('hidden');
            toggle.setAttribute('aria-expanded', 'false');
        };

        toggle.addEventListener('click', () => {
            const isHidden = menu.classList.contains('hidden');

            if (isHidden) {
                menu.classList.remove('hidden');
                toggle.setAttribute('aria-expanded', 'true');
            } else {
                closeMenu();
            }
        });

        menu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                closeMenu();
            });
        });
    })();
</script>
