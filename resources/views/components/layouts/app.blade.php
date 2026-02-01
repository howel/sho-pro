<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body class="bg-gray-100 font-sans antialiased">
        @livewire('navigation')

        <main>
            {{ $slot }}
        </main>

        <!-- footer -->


        @livewire('footer')
        
        @livewireScripts

        <style>

            /* Animación para whatsapp */

            @keyframes custom-bounce {
                0%, 100% { transform: scale(1); }
                50% { transform: scale(1.1); }
            }
            .animate-whatsapp {
                animation: custom-bounce 2s infinite;
            }
            
            @keyframes pulse-green {
                0% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7); }
                70% { box-shadow: 0 0 0 15px rgba(37, 211, 102, 0); }
                100% { box-shadow: 0 0 0 0 rgba(37, 211, 102, 0); }
            }
            .animate-pulse-green { animation: pulse-green 2s infinite; }
            
            /* Ocultar menú por defecto */
            #whatsapp-menu { display: none; }
            #whatsapp-menu.active { display: block; animation: fadeIn 0.3s ease; }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }

            /* Animación para el número del carrito */
            @keyframes bounce-short {
                0%, 100% { transform: scale(1) translate(25%, -25%); }
                50% { transform: scale(1.4) translate(25%, -25%); }
            }

            .animate-bounce-short {
                animation: bounce-short 0.5s ease-in-out;
            }
        </style>

        <div class="fixed bottom-6 right-6 z-50">
            <div id="whatsapp-menu" class="mb-4 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden w-72">
                <div class="bg-[#25D366] p-4 text-white text-center">
                    <p class="font-bold">¿Cómo podemos ayudarte? 👋</p>
                    <p class="text-xs opacity-90">Selecciona la sede más cercana</p>
                </div>
                
                <div class="p-2 space-y-1">
                    <div class="p-2 border-b border-gray-50">
                        <p class="text-[10px] uppercase font-bold text-gray-400 px-2">Sede Nueva Cajamarca</p>
                        <a href="#" class="wa-link flex items-center gap-3 p-2 hover:bg-green-50 rounded-lg transition" data-tel="51969979954">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold">V1</div>
                            <div>
                                <p class="text-sm font-bold text-gray-700">Asesor(a) Doris Santa Cruz</p>
                                <p class="text-[11px] text-gray-500">Venta de Motos</p>
                            </div>
                        </a>

                        <a href="#" class="wa-link flex items-center gap-3 p-2 hover:bg-green-50 rounded-lg transition" data-tel="51969979954">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold">V2</div>
                            <div>
                                <p class="text-sm font-bold text-gray-700">Asesor(a) Mirian</p>
                                <p class="text-[11px] text-gray-500">Venta de Repuestos</p>
                            </div>
                        </a>
                    </div>

                    <div class="p-2">
                        <p class="text-[10px] uppercase font-bold text-gray-400 px-2">Sede Moyobamba</p>
                        <a href="#" class="wa-link flex items-center gap-3 p-2 hover:bg-green-50 rounded-lg transition" data-tel="51969979954">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold">V3</div>
                            <div>
                                <p class="text-sm font-bold text-gray-700">Asesor(a) Angel</p>
                                <p class="text-[11px] text-gray-500">Venta de Motos</p>
                            </div>
                        </a>

                        <a href="#" class="wa-link flex items-center gap-3 p-2 hover:bg-green-50 rounded-lg transition" data-tel="51969979954">
                            <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold">R1</div>
                            <div>
                                <p class="text-sm font-bold text-gray-700">Asesor(a)Veronica</p>
                                <p class="text-[11px] text-gray-500">Venta de Repuestos</p>
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

        <script>
            function toggleWaMenu() {
                const menu = document.getElementById('whatsapp-menu');
                menu.classList.toggle('active');
            }

            document.addEventListener('DOMContentLoaded', function() {
                const currentUrl = window.location.href;
                const pageTitle = document.title;
                const links = document.querySelectorAll('.wa-link');

                links.forEach(link => {
                    const tel = link.getAttribute('data-tel');
                    const vendedor = link.querySelector('p.text-sm').innerText;
                    
                    // Mensaje que incluye Sede/Vendedor y la URL actual
                    const mensaje = `Hola ${vendedor}! 👋 Estoy interesado en este producto de la tienda SHOPPRO: ${pageTitle}\nLink: ${currentUrl}`;
                    
                    link.href = `https://wa.me/${tel}?text=${encodeURIComponent(mensaje)}`;
                    link.target = "_blank";
                });
            });

            // Cerrar menú si se hace clic fuera
            document.addEventListener('click', function(event) {
                const isClickInside = document.getElementById('whatsapp-menu').contains(event.target) || 
                                     event.target.closest('button');
                if (!isClickInside) {
                    document.getElementById('whatsapp-menu').classList.remove('active');
                }
            });


        </script>
    </body>

</html>
