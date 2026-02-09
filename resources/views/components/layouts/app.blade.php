<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Importaciones Salazar' }}</title>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.tailwindcss.com"></script>

        {{-- Slider home inicio --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

        <style>
            @keyframes custom-bounce { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.1); } }
            .animate-whatsapp { animation: custom-bounce 2s infinite; }
            @keyframes pulse-green { 0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); } 70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); } 100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); } }
            .animate-pulse-green { animation: pulse-green 2s infinite; }
            #whatsapp-menu { display: none; }
            #whatsapp-menu.active { display: block; animation: fadeIn 0.3s ease; }
            @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        </style>
        @livewireStyles
        
    </head>
    <body class="bg-gray-100 font-sans antialiased">
        
        @livewire('navigation')

        <main class="min-h-screen">
            {{ $slot }}
        </main>

        @livewire('footer')
        
        {{-- Botón de WhatsApp flotante --}}
        <div class="fixed bottom-6 right-6 z-50">
            <div id="whatsapp-menu" class="mb-4 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden w-72">
                <div class="bg-[#25D366] p-4 text-white text-center">
                    <p class="font-bold">¿Cómo podemos ayudarte? 👋</p>
                    <p class="text-xs opacity-90">Selecciona la sede más cercana</p>
                </div>
                <div class="p-2 space-y-1">
                    {{-- Sede Nueva Cajamarca --}}
                    <div class="p-2 border-b border-gray-50">
                        <p class="text-[10px] uppercase font-bold text-gray-400 px-2">Sede Nueva Cajamarca</p>
                        <a href="#" class="wa-link flex items-center gap-3 p-2 hover:bg-green-50 rounded-lg transition" data-tel="51969979954">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-xs">V1</div>
                            <div>
                                <p class="text-sm font-bold text-gray-700">Doris Santa Cruz</p>
                                <p class="text-[11px] text-gray-500">Ventas</p>
                            </div>
                        </a>
                    </div>
                    {{-- Sede Moyobamba --}}
                    <div class="p-2">
                        <p class="text-[10px] uppercase font-bold text-gray-400 px-2">Sede Moyobamba</p>
                        <a href="#" class="wa-link flex items-center gap-3 p-2 hover:bg-green-50 rounded-lg transition" data-tel="51969979954">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold text-xs">V2</div>
                            <div>
                                <p class="text-sm font-bold text-gray-700">Asesor Angel</p>
                                <p class="text-[11px] text-gray-500">Motos y Repuestos</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <button onclick="toggleWaMenu()" class="w-16 h-16 bg-[#25D366] rounded-full shadow-2xl flex items-center justify-center text-white transition-all transform hover:scale-110 animate-pulse-green">
                <svg class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.319 1.592 5.548 0 10.064-4.516 10.066-10.066.002-2.686-1.047-5.212-2.952-7.115s-4.432-2.956-7.118-2.957c-5.549 0-10.063 4.515-10.066 10.065-.003 1.902.504 3.756 1.471 5.44l-1.015 3.703 3.832-1.004-.537.342z"/>
                </svg>
            </button>
        </div>

        @livewireScripts
        <script>
            function toggleWaMenu() {
                const menu = document.getElementById('whatsapp-menu');
                menu.classList.toggle('active');
            }
            
            document.addEventListener('DOMContentLoaded', function() {
                const links = document.querySelectorAll('.wa-link');
                links.forEach(link => {
                    const tel = link.getAttribute('data-tel');
                    const vendedor = link.querySelector('p.text-sm').innerText;
                    const mensaje = `Hola ${vendedor}! 👋 Vengo de la web, deseo información.`;
                    link.href = `https://wa.me/${tel}?text=${encodeURIComponent(mensaje)}`;
                    link.target = "_blank";
                });
            });
        </script>
    </body>
</html>