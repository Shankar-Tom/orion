<!DOCTYPE html>

<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&amp;family=Geist:wght@600;700;800&amp;family=JetBrains+Mono:wght@400;600&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-tint": "#d0bcff",
                        "surface-container-high": "#1c2b3c",
                        "on-tertiary-fixed-variant": "#43474e",
                        "on-surface": "#d4e4fa",
                        "surface-bright": "#2c3a4c",
                        "on-secondary-container": "#00424e",
                        "on-background": "#d4e4fa",
                        "on-secondary": "#003640",
                        "inverse-on-surface": "#233143",
                        "on-primary-fixed-variant": "#5516be",
                        "on-primary": "#3c0091",
                        "primary-fixed": "#e9ddff",
                        "surface-container-low": "#0d1c2d",
                        "on-secondary-fixed-variant": "#004e5c",
                        "on-tertiary-container": "#262a31",
                        "on-surface-variant": "#cbc3d7",
                        "error": "#ffb4ab",
                        "tertiary-fixed": "#dfe2eb",
                        "outline": "#958ea0",
                        "secondary-fixed": "#acedff",
                        "on-primary-container": "#340080",
                        "inverse-surface": "#d4e4fa",
                        "on-error": "#690005",
                        "on-tertiary": "#2d3137",
                        "on-error-container": "#ffdad6",
                        "secondary-fixed-dim": "#4cd7f6",
                        "secondary": "#4cd7f6",
                        "surface-variant": "#273647",
                        "error-container": "#93000a",
                        "inverse-primary": "#6d3bd7",
                        "tertiary": "#c3c6cf",
                        "on-tertiary-fixed": "#181c22",
                        "surface-container-lowest": "#010f1f",
                        "secondary-container": "#03b5d3",
                        "primary": "#d0bcff",
                        "surface-container-highest": "#273647",
                        "surface-dim": "#051424",
                        "tertiary-container": "#8d9199",
                        "primary-fixed-dim": "#d0bcff",
                        "outline-variant": "#494454",
                        "surface": "#051424",
                        "on-secondary-fixed": "#001f26",
                        "tertiary-fixed-dim": "#c3c6cf",
                        "surface-container": "#122131",
                        "on-primary-fixed": "#23005c",
                        "primary-container": "#a078ff",
                        "background": "#051424"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.125rem",
                        "lg": "0.25rem",
                        "xl": "0.5rem",
                        "full": "0.75rem"
                    },
                    "spacing": {
                        "margin-desktop": "64px",
                        "max-width": "1280px",
                        "margin-mobile": "16px",
                        "unit": "4px",
                        "gutter": "24px"
                    },
                    "fontFamily": {
                        "headline-lg-mobile": ["Geist"],
                        "display-lg": ["Geist"],
                        "headline-lg": ["Geist"],
                        "code-sm": ["JetBrains Mono"],
                        "body-md": ["Inter"],
                        "label-caps": ["JetBrains Mono"]
                    },
                    "fontSize": {
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "32px",
                            "fontWeight": "600"
                        }],
                        "display-lg": ["48px", {
                            "lineHeight": "56px",
                            "letterSpacing": "-0.02em",
                            "fontWeight": "700"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "40px",
                            "letterSpacing": "-0.01em",
                            "fontWeight": "600"
                        }],
                        "code-sm": ["14px", {
                            "lineHeight": "20px",
                            "fontWeight": "400"
                        }],
                        "body-md": ["16px", {
                            "lineHeight": "24px",
                            "fontWeight": "400"
                        }],
                        "label-caps": ["12px", {
                            "lineHeight": "16px",
                            "fontWeight": "600"
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        .stellar-grid {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(30, 41, 59, 0.2) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(30, 41, 59, 0.2) 1px, transparent 1px);
        }

        .glow-effect {
            box-shadow: 0 0 20px 2px rgba(208, 188, 255, 0.15);
        }

        .cyber-border {
            border: 1px solid rgba(30, 41, 59, 1);
        }

        .micro-glow {
            filter: drop-shadow(0 0 4px rgba(76, 215, 246, 0.4));
        }

        body {
            background-color: #051424;
            color: #d4e4fa;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="selection:bg-primary-container selection:text-on-primary-container">
    <!-- TopNavBar -->
    <nav class="fixed top-0 w-full z-50 bg-surface/80 dark:bg-surface/80 backdrop-blur-md border-b border-outline-variant/20 transition-all duration-300 ease-in-out">
        <div class="flex justify-between items-center max-w-max-width mx-auto px-margin-desktop h-16">
            <div class="font-headline-lg text-headline-lg font-bold text-primary tracking-tighter">Orion</div>
            <div class="hidden md:flex items-center gap-8">
                <a class="text-primary font-bold border-b-2 border-primary pb-1 font-body-md text-body-md" href="#">Framework</a>
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="#">Docs</a>
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="#">Ecosystem</a>
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="#">Showcase</a>
                <a class="text-on-surface-variant font-medium hover:text-primary transition-colors duration-200 font-body-md text-body-md" href="#">Community</a>
            </div>
            <div class="flex items-center gap-4">
                <button class="bg-primary-container text-on-primary-container px-6 py-2 rounded font-medium hover:opacity-90 transition-all">Get Started</button>
                <button class="md:hidden text-on-surface">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="relative pt-32 pb-20 overflow-hidden stellar-grid">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-surface/50 to-surface pointer-events-none"></div>
        <div class="absolute top-1/4 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-primary/10 rounded-full blur-[120px] pointer-events-none"></div>
        <div class="relative max-w-max-width mx-auto px-margin-desktop text-center">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-primary/20 bg-primary/5 mb-8">
                <span class="w-2 h-2 rounded-full bg-secondary animate-pulse micro-glow"></span>
                <span class="font-label-caps text-label-caps text-secondary tracking-widest uppercase">Version 2.0 Launching Now</span>
            </div>
            <h1 class="font-display-lg text-display-lg md:text-[64px] text-white leading-tight mb-6 max-w-4xl mx-auto">
                PHP at the <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">Speed of Light</span>
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-2xl mx-auto mb-10 text-lg">
                The framework for building blazing-fast, secure, and modern web applications without the boilerplate. Engineered for performance, designed for developers.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <button class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-primary-container to-primary text-on-primary-container font-bold rounded shadow-lg hover:scale-105 transition-transform">
                    Get Started Free
                </button>
                <button class="w-full sm:w-auto px-8 py-4 border border-outline-variant/30 bg-surface-container-low text-on-surface font-bold rounded hover:bg-surface-container-high transition-colors">
                    View Documentation
                </button>
            </div>
        </div>
    </section>
    <!-- Social Proof -->
    <section class="py-12 bg-surface-container-lowest/50 border-y border-outline-variant/10">
        <div class="max-w-max-width mx-auto px-margin-desktop">
            <p class="text-center font-label-caps text-label-caps text-on-surface-variant mb-8 uppercase tracking-widest">Trusted by modern engineering teams</p>
            <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-50 grayscale hover:grayscale-0 transition-all duration-500">
                <img alt="Company 1" class="h-8" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5lM07CaeWIWxR8xTOzjATiAAuzJAg2upZAblvvr6ns6Kv_7jdzBEbOOUH83hmK6p51YrT27FSAS08jSorp_4Hr-5z6kcADVEWPHYrG6w36V6zApjMpXocJ-afz4ZrDlNisXMi6V70PuKAYTcbEcrRV64x-npYGCReIQVkVhxe0ld0iG66buMIfAuFzPNYFjVXV3OLa12q9zJm5RSzTUadBH-rR8kx6TvkapRkOqa_KOdZqhWN_ZPHCOBZUhkM4pxpVW5WNwkHbBlJ" />
                <img alt="Company 2" class="h-8" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6oyvW1dB4E1MeWZqavmDxdPxV1F4_GMD4Dh6u1NIsDyOuRSJWOeFGFoc7PEtCSry_ntqaymO1hz2Ov9ky985SAo13JfBUJT8Bxc9hBC_UfOFPuS87nNpcBKSt1inJPURBUvF03B7ffSWIiMab-fNRZkyjzNsVYCsikV1yPoZvkDexrBjWitQGcFLUBXlWJ6IUtqrLq9Ap_-wL_AWlQAvgnb9dJAErwRGnLHMY6bjy6MJ4Fwgw7ses0RQVO6_L4pOSuNdOKKwvTdGo" />
                <img alt="Company 3" class="h-8" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQulaf6qHYfW9vxUqJWmEUML_OfL-Z6dimihXopnLE_uDs1nX2qA73wzej0cPjFTyLcBSZVT_q2AFcCF9K8E55dGo0NO-UIuGJVCJgXmPNyPhXW-sQbxp3wRYqk-xRVKNFsjf8dnEqjpLZPYkQHx4dHpKHSVSXYX84eYpG5osc2R8I2SoAQb01vohc0mF625r5mfk169LIlukr6376a_XjfuRvKPg4o5FPF922xAw_15qPCGCbpEbv0RnQ5fKrtwBDjDlwFjrcjvKd" />
                <img alt="Company 4" class="h-8" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAh5BeP60-fog341SUjSmzb4gn6f4ypjSgNXmI0BIEYeHHVyQ6ifoWNZDi-w21lMEy_l8xDubqnP8wgGHBKffMIuMkVBoERzCjaJYQXnDeFHl5PZyEmXtMOZU9FC6FK8DOfleBp_kO4LJj-zJLx8zbgDvoBVr2Mf-nj0K3QSWQdpHDpv5_TGXRas6FPJJsmTQlA-7rwzAGY_eOY-0VBqyucXPzFXEybOOQzoMhZSO8vmgmBqxeb18YkcLZUBms5LBUVlPAJdUnqN-Ud" />
                <img alt="Company 5" class="h-8" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD3Ilox2O8VrKr2o23Iddqon4692ap3D6CGNALDHfz4dHXG6ttoI-oO4Cy4ZPUGMrggBkFAkBfB1ZMvHuyKZbcU6t96FZdJvhHGQjCrXIkMEmxGsmJBD9jnGyE0T8bH3E5FHmzDn55HnxSuH0_mwZ5wlY9yGtd3im78iy3NJYBOXrBc4hVp2YxE4VpDWPPik5VY9mrXi9Spv2YKArBi_x_REYR_jGvfSfS4tkc2QHu4qetCyEPoLPeZIriqpHUo3X_upkFkp415eqXC" />
            </div>
        </div>
    </section>
    <!-- Code Preview Section -->
    <section class="py-24 bg-surface">
        <div class="max-w-max-width mx-auto px-margin-desktop grid md:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="font-headline-lg text-headline-lg text-white mb-6">Built for Clarity and Speed</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-8">
                    Orion eliminates the cognitive load of traditional PHP frameworks. With a focus on type safety and expressive syntax, you can go from idea to production in minutes.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span class="font-body-md text-body-md">Native Async/Await support</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span class="font-body-md text-body-md">Integrated Type-Safe Routing</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-secondary" style="font-variation-settings: 'FILL' 1;">check_circle</span>
                        <span class="font-body-md text-body-md">Zero-Dependency Core</span>
                    </li>
                </ul>
            </div>
            <div class="relative group">
                <div class="absolute -inset-4 bg-secondary/10 rounded-xl blur-2xl group-hover:bg-secondary/20 transition-all duration-700"></div>
                <div class="relative bg-[#010409] border border-outline-variant/30 rounded-xl overflow-hidden shadow-2xl">
                    <div class="bg-surface-container-high px-4 py-2 flex items-center justify-between border-b border-outline-variant/20">
                        <div class="flex gap-1.5">
                            <div class="w-3 h-3 rounded-full bg-red-500/50"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500/50"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500/50"></div>
                        </div>
                        <div class="text-xs font-code-sm text-on-surface-variant">UserController.php</div>
                        <button class="text-on-surface-variant hover:text-white transition-colors">
                            <span class="material-symbols-outlined text-sm">content_copy</span>
                        </button>
                    </div>
                    <div class="p-6 font-code-sm text-code-sm overflow-x-auto">
                        <pre class="text-[#8b949e]"><code><span class="text-[#ff7b72]">namespace</span> App\Controllers;

<span class="text-[#ff7b72]">use</span> Orion\Http\Response;
<span class="text-[#ff7b72]">use</span> App\Models\User;

<span class="text-[#d2a8ff]">#[Route('/api/users/{id}')]</span>
<span class="text-[#ff7b72]">class</span> <span class="text-[#ffa657]">UserController</span>
{
    <span class="text-[#ff7b72]">public function</span> <span class="text-[#d2a8ff]">show</span>(int $id): <span class="text-[#79c0ff]">Response</span>
    {
        $user = <span class="text-[#79c0ff]">User</span>::<span class="text-[#d2a8ff]">findOrFail</span>($id);
        
        <span class="text-[#ff7b72]">return</span> <span class="text-[#79c0ff]">Response</span>::<span class="text-[#d2a8ff]">json</span>([
            <span class="text-[#a5d6ff]">'status'</span> =&gt; <span class="text-[#a5d6ff]">'success'</span>,
            <span class="text-[#a5d6ff]">'data'</span>   =&gt; $user
        ]);
    }
}</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Feature Grid -->
    <section class="py-24 bg-surface-container-lowest relative">
        <div class="max-w-max-width mx-auto px-margin-desktop">
            <div class="text-center mb-16">
                <h2 class="font-headline-lg text-headline-lg text-white mb-4">Why Orion?</h2>
                <div class="h-1 w-20 bg-primary mx-auto rounded-full"></div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-gutter">
                <!-- Card 1 -->
                <div class="bg-surface-container p-8 border border-outline-variant/20 hover:border-primary/50 transition-all group">
                    <div class="w-12 h-12 rounded bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
                        <span class="material-symbols-outlined text-primary group-hover:text-on-primary">bolt</span>
                    </div>
                    <h3 class="font-headline-lg text-xl text-white mb-4">Lightning Fast</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Optimized runtime execution that outperforms traditional PHP frameworks by 300% in high-load scenarios.
                    </p>
                </div>
                <!-- Card 2 -->
                <div class="bg-surface-container p-8 border border-outline-variant/20 hover:border-secondary/50 transition-all group">
                    <div class="w-12 h-12 rounded bg-secondary/10 flex items-center justify-center mb-6 group-hover:bg-secondary transition-colors">
                        <span class="material-symbols-outlined text-secondary group-hover:text-on-secondary">developer_mode_tv</span>
                    </div>
                    <h3 class="font-headline-lg text-xl text-white mb-4">Developer Friendly</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Clean API design, auto-loading, and a powerful CLI that stays out of your way and lets you build.
                    </p>
                </div>
                <!-- Card 3 -->
                <div class="bg-surface-container p-8 border border-outline-variant/20 hover:border-primary/50 transition-all group">
                    <div class="w-12 h-12 rounded bg-primary/10 flex items-center justify-center mb-6 group-hover:bg-primary transition-colors">
                        <span class="material-symbols-outlined text-primary group-hover:text-on-primary">verified_user</span>
                    </div>
                    <h3 class="font-headline-lg text-xl text-white mb-4">Strictly Typed</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Leverage PHP 8.3+ features to the fullest. Orion is built from the ground up with strict types for ultimate stability.
                    </p>
                </div>
                <!-- Card 4 -->
                <div class="bg-surface-container p-8 border border-outline-variant/20 hover:border-secondary/50 transition-all group">
                    <div class="w-12 h-12 rounded bg-secondary/10 flex items-center justify-center mb-6 group-hover:bg-secondary transition-colors">
                        <span class="material-symbols-outlined text-secondary group-hover:text-on-secondary">rocket_launch</span>
                    </div>
                    <h3 class="font-headline-lg text-xl text-white mb-4">Zero-Config</h3>
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Built-in Docker support and automated CI/CD templates for seamless deployment to any cloud provider.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Final CTA -->
    <section class="py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-primary/5 via-transparent to-secondary/5"></div>
        <div class="max-w-4xl mx-auto px-margin-desktop text-center relative z-10">
            <div class="bg-surface-container-high border border-outline-variant/20 p-12 md:p-20 rounded-2xl glow-effect">
                <h2 class="font-display-lg text-headline-lg md:text-display-lg text-white mb-6">Join the Orion Nebula</h2>
                <p class="font-body-md text-body-md text-on-surface-variant mb-10 text-lg">
                    Start building the next generation of web applications today. Free, open-source, and community-driven forever.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-6">
                    <button class="px-10 py-4 bg-primary text-on-primary font-bold rounded shadow-lg hover:shadow-primary/20 transition-all">
                        Get Started Now
                    </button>
                    <a class="text-secondary font-medium hover:underline flex items-center gap-2" href="#">
                        Read the Manifesto <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="w-full pt-16 pb-8 bg-surface-container-lowest dark:bg-surface-container-lowest border-t border-outline-variant/10">
        <div class="max-w-max-width mx-auto px-margin-desktop grid grid-cols-2 md:grid-cols-4 gap-gutter mb-12">
            <div class="col-span-2 md:col-span-1">
                <div class="font-headline-lg text-headline-lg font-bold text-primary mb-4">Orion</div>
                <p class="font-body-md text-body-md text-on-surface-variant opacity-80">
                    Redefining what's possible with PHP. Forged in the clouds, built for the earth.
                </p>
            </div>
            <div>
                <h4 class="font-label-caps text-label-caps text-white mb-4 uppercase">Resources</h4>
                <ul class="space-y-2">
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors opacity-80 hover:opacity-100" href="#">Documentation</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors opacity-80 hover:opacity-100" href="#">API Reference</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors opacity-80 hover:opacity-100" href="#">Tutorials</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-label-caps text-label-caps text-white mb-4 uppercase">Community</h4>
                <ul class="space-y-2">
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors opacity-80 hover:opacity-100" href="#">GitHub</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors opacity-80 hover:opacity-100" href="#">Twitter</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors opacity-80 hover:opacity-100" href="#">Discord</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-label-caps text-label-caps text-white mb-4 uppercase">Legal</h4>
                <ul class="space-y-2">
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors opacity-80 hover:opacity-100" href="#">Privacy Policy</a></li>
                    <li><a class="font-body-md text-body-md text-on-surface-variant hover:text-secondary transition-colors opacity-80 hover:opacity-100" href="#">Terms of Service</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-max-width mx-auto px-margin-desktop pt-8 border-t border-outline-variant/5 text-center md:text-left">
            <p class="font-body-md text-body-md text-on-surface-variant opacity-60">© 2024 Orion Framework. Built for speed.</p>
        </div>
    </footer>
    <script>
        // Micro-interaction for code block copy (visual only)
        document.querySelector('.material-symbols-outlined.text-sm')?.addEventListener('click', function() {
            const original = this.innerText;
            this.innerText = 'check';
            this.classList.add('text-green-500');
            setTimeout(() => {
                this.innerText = original;
                this.classList.remove('text-green-500');
            }, 2000);
        });

        // Subtle header scroll effect
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('py-2', 'shadow-lg');
                nav.classList.remove('h-16');
            } else {
                nav.classList.remove('py-2', 'shadow-lg');
                nav.classList.add('h-16');
            }
        });
    </script>
</body>

</html>