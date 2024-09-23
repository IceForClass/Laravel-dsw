<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <!-- Cambiar la imagen de fondo -->
            <!-- Opción 1: Reemplazar la imagen SVG por una imagen personalizada -->
            <!-- Asegúrate de subir tu imagen a la carpeta 'public/images' y actualizar la ruta -->
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="{{ asset('images/tu_nueva_imagen_de_fondo.png') }}" alt="Background Image" />

            <!-- Opción 2: Cambiar el color de fondo en lugar de usar una imagen -->
            <!-- <div class="absolute inset-0 bg-blue-500"></div> -->

            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <!-- Reemplazar el SVG del logo con tu imagen -->
                        <div class="flex lg:justify-center lg:col-start-2">
                            <img src="{{ asset('images/logo_community_links.png') }}" alt="Logo"
                            class="w-16 h-auto sm:w-24 md:w-32 lg:w-40 mr-4">
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Iniciar Sesión
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Registrarse
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <!-- Sección Hero -->
                    <section class="text-center py-20">
                        <h1 class="text-4xl font-bold mb-4">Bienvenido a Nuestra Aplicación Laravel</h1>
                        <p class="text-lg mb-8">Construida con Laravel y Tailwind CSS para ofrecerte la mejor experiencia.</p>
                        <a href="{{ route('register') }}" class="bg-[#FF2D20] text-white px-6 py-3 rounded-md hover:bg-[#e02b1e] transition">
                            Comienza Ahora
                        </a>
                    </section>

                    <!-- Sección Características -->
                    <section class="py-20 bg-white dark:bg-zinc-900">
                        <div class="max-w-4xl mx-auto">
                            <h2 class="text-3xl font-semibold text-center mb-12">Características Principales</h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <div class="flex items-start">
                                    <svg class="w-8 h-8 text-[#FF2D20] mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <!-- Icono SVG -->
                                        <path d="..." stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div>
                                        <h3 class="text-xl font-semibold mb-2">Rendimiento Óptimo</h3>
                                        <p>Nuestra aplicación está optimizada para ofrecer un rendimiento rápido y eficiente.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-8 h-8 text-[#FF2D20] mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <!-- Icono SVG -->
                                        <path d="..." stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div>
                                        <h3 class="text-xl font-semibold mb-2">Seguridad</h3>
                                        <p>Mantenemos tus datos seguros con las mejores prácticas de la industria.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-8 h-8 text-[#FF2D20] mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <!-- Icono SVG -->
                                        <path d="..." stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div>
                                        <h3 class="text-xl font-semibold mb-2">Interfaz Intuitiva</h3>
                                        <p>Disfruta de una interfaz de usuario fácil de usar y altamente intuitiva.</p>
                                    </div>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-8 h-8 text-[#FF2D20] mr-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <!-- Icono SVG -->
                                        <path d="..." stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div>
                                        <h3 class="text-xl font-semibold mb-2">Soporte 24/7</h3>
                                        <p>Estamos disponibles en todo momento para ayudarte con cualquier duda o problema.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Sección Testimonios -->
                    <section class="py-20 bg-gray-100 dark:bg-zinc-800">
                        <div class="max-w-4xl mx-auto">
                            <h2 class="text-3xl font-semibold text-center mb-12">Lo que Dicen Nuestros Usuarios</h2>
                            <div class="space-y-8">
                                <div class="bg-white dark:bg-zinc-900 p-6 rounded-md shadow-md">
                                    <p class="text-gray-700 dark:text-gray-300 mb-4">"Esta aplicación ha transformado la manera en que gestiono mis proyectos. ¡Altamente recomendada!"</p>
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40" alt="Usuario" class="w-10 h-10 rounded-full mr-4">
                                        <div>
                                            <p class="font-semibold">Juan Pérez</p>
                                            <p class="text-sm text-gray-500">Desarrollador</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white dark:bg-zinc-900 p-6 rounded-md shadow-md">
                                    <p class="text-gray-700 dark:text-gray-300 mb-4">"Una interfaz increíble y un rendimiento excepcional. No podría estar más satisfecho."</p>
                                    <div class="flex items-center">
                                        <img src="https://via.placeholder.com/40" alt="Usuario" class="w-10 h-10 rounded-full mr-4">
                                        <div>
                                            <p class="font-semibold">María López</p>
                                            <p class="text-sm text-gray-500">Diseñadora UX</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Sección CTA -->
                    <section class="text-center py-20">
                        <h2 class="text-3xl font-semibold mb-4">¿Listo para comenzar?</h2>
                        <p class="text-lg mb-8">Únete a miles de usuarios satisfechos y mejora tu flujo de trabajo hoy mismo.</p>
                        <a href="{{ route('register') }}" class="bg-[#FF2D20] text-white px-6 py-3 rounded-md hover:bg-[#e02b1e] transition">
                            Registrarse Ahora
                        </a>
                    </section>

                    <!-- Footer -->
                    <footer class="py-10 bg-gray-50 dark:bg-zinc-900">
                        <div class="max-w-4xl mx-auto text-center">
                            <p class="text-gray-500 dark:text-gray-400">&copy; {{ date('Y') }} Tu Empresa. Todos los derechos reservados.</p>
                            <div class="mt-4 flex justify-center space-x-4">
                                <a href="#" class="text-gray-500 hover:text-[#FF2D20] transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <!-- Icono de Facebook -->
                                        <path d="M22.675 0h-21.35C.597 0 0 .597 0 1.325v21.351C0 23.403.597 24 1.325 24h11.495v-9.294H9.691V11.41h3.129V8.797c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.464.099 2.795.143v3.24l-1.918.001c-1.504 0-1.796.715-1.796 1.763v2.312h3.587l-.467 3.296h-3.12V24h6.116C23.403 24 24 23.403 24 22.676V1.325C24 .597 23.403 0 22.675 0z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-[#FF2D20] transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <!-- Icono de Twitter -->
                                        <path d="M23.954 4.569c-.885.392-1.83.656-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-2.723 0-4.928 2.205-4.928 4.928 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.708.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.229-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.376 4.6 3.416-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.179 1.394 4.768 2.209 7.557 2.209 9.054 0 14-7.496 14-13.986 0-.21 0-.423-.016-.634.961-.689 1.8-1.56 2.46-2.548l-.047-.02z"/>
                                    </svg>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-[#FF2D20] transition">
                                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                        <!-- Icono de Instagram -->
                                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.337 3.608 1.312.975.975 1.25 2.242 1.312 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.337 2.633-1.312 3.608-.975.975-2.242 1.25-3.608 1.312-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.337-3.608-1.312-.975-.975-1.25-2.242-1.312-3.608C2.175 15.747 2.163 15.367 2.163 12s.012-3.584.07-4.85c.062-1.366.337-2.633 1.312-3.608.975-.975 2.242-1.25 3.608-1.312C8.416 2.175 8.796 2.163 12 2.163zm0-2.163C8.741 0 8.332.012 7.052.07 5.775.129 4.601.434 3.678 1.357 2.755 2.28 2.45 3.454 2.392 4.73 2.334 6.01 2.322 6.419 2.322 12s.012 6.99.07 8.27c.058 1.276.363 2.45 1.286 3.373.923.923 2.097 1.228 3.373 1.286 1.28.058 1.689.07 8.27.07s6.99-.012 8.27-.07c1.276-.058 2.45-.363 3.373-1.286.923-.923 1.228-2.097 1.286-3.373.058-1.28.07-1.689.07-8.27s-.012-6.99-.07-8.27c-.058-1.276-.363-2.45-1.286-3.373C19.45.434 18.276.129 17 .07 15.72.012 15.311 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zm0 10.162a3.999 3.999 0 110-7.998 3.999 3.999 0 010 7.998zm6.406-11.845a1.44 1.44 0 11-2.88 0 1.44 1.44 0 012.88 0z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
