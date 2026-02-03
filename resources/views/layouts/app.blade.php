<!DOCTYPE html>
<html class="scroll-smooth" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Nexa Sites - Solusi Digital')</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;family=Outfit:wght@400;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet"/>
    @php
        $hasVite = file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'));
    @endphp
    @if ($hasVite)
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
        <script>
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            primary: "#FF8800",
                            "primary-hover": "#E07700",
                            "background-light": "#F3F4F6",
                            "background-dark": "#0B0F19",
                            "surface-light": "#FFFFFF",
                            "surface-dark": "#161E2E",
                            "accent-purple": "#6D28D9",
                            "accent-purple-light": "#8B5CF6",
                        },
                        fontFamily: {
                            display: ["Outfit", "sans-serif"],
                            body: ["Inter", "sans-serif"],
                        },
                        borderRadius: {
                            DEFAULT: "0.5rem",
                            xl: "1rem",
                            "2xl": "1.5rem",
                        },
                        backgroundImage: {
                            "hero-pattern": "url('https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')",
                            "tech-grid": "linear-gradient(to right, #1f2937 1px, transparent 1px), linear-gradient(to bottom, #1f2937 1px, transparent 1px)",
                        },
                    },
                },
            };
        </script>
        <style>
            .clip-diagonal {
                clip-path: polygon(0 0, 100% 10%, 100% 100%, 0% 100%);
            }
            .clip-diagonal-top {
                clip-path: polygon(0 10%, 100% 0, 100% 100%, 0% 100%);
            }
            .glow-text {
                text-shadow: 0 0 20px rgba(255, 136, 0, 0.5);
            }
            .line-clamp-3 {
                display: -webkit-box;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 3;
                overflow: hidden;
            }
            @keyframes shimmer {
                0% {
                    transform: translateX(-100%);
                }
                100% {
                    transform: translateX(100%);
                }
            }
        </style>
    @endif
    @stack('head')
</head>
<body class="bg-background-light dark:bg-background-dark text-gray-800 dark:text-gray-100 font-body transition-colors duration-300">
    @yield('content')
</body>
</html>
