<x-layouts.app>
    {{-- Header --}}
    <div class="bg-[#0f172a] py-16 text-center">
        <span class="text-orange-500 font-bold tracking-widest uppercase text-[10px] mb-2 block">Especialistas Autorizados</span>
        <h1 class="text-5xl font-black text-white uppercase tracking-tighter">Nuestros <span class="text-orange-500">Servicios</span></h1>
    </div>

    <div class="bg-white py-12">
        <div class="container mx-auto px-4">
            
            {{-- SECCIÓN VENTA --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
                {{-- Card Motos --}}
                <div class="relative overflow-hidden rounded-[2rem] bg-gray-800 h-[380px] shadow-lg">
                    {{-- Usamos una imagen de stock segura para evitar errores de carga --}}
                    <img src="https://images.unsplash.com/photo-1558981403-c5f91bbde3ec?q=80&w=800" class="w-full h-full object-cover opacity-50" alt="Motos">
                    <div class="absolute inset-0 p-8 flex flex-col justify-end bg-gradient-to-t from-black to-transparent">
                        <h3 class="text-3xl font-black text-white uppercase italic">Motocicletas</h3>
                        <p class="text-gray-300 text-sm mt-2">Modelos pisteros, todoterreno y de trabajo.</p>
                        <a href="/contacto" class="text-orange-500 font-bold uppercase text-xs mt-4">Ver Catálogo →</a>
                    </div>
                </div>

                {{-- Card Fuerza --}}
                <div class="relative overflow-hidden rounded-[2rem] bg-gray-800 h-[380px] shadow-lg">
                    <img src="https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=800" class="w-full h-full object-cover opacity-50" alt="Fuerza">
                    <div class="absolute inset-0 p-8 flex flex-col justify-end bg-gradient-to-t from-black to-transparent">
                        <h3 class="text-3xl font-black text-orange-500 uppercase italic">Equipos de Fuerza</h3>
                        <p class="text-gray-300 text-sm mt-2">Motobombas y generadores de alto rendimiento.</p>
                        <div class="mt-4"><span class="bg-white text-black px-3 py-1 rounded-full text-[9px] font-black uppercase">Garantía Honda</span></div>
                    </div>
                </div>
            </div>

            {{-- SERVICIOS TÉCNICOS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-20">
                <div class="bg-gray-50 p-8 rounded-3xl border border-gray-100 shadow-sm text-center">
                    <h3 class="font-black text-gray-900 uppercase mb-2">Taller Especializado</h3>
                    <p class="text-gray-500 text-xs">Mantenimiento y reparación experta.</p>
                </div>
                <div class="bg-orange-600 p-8 rounded-3xl shadow-lg text-center">
                    <h3 class="font-black text-white uppercase mb-2">Repuestos Genuinos</h3>
                    <p class="text-orange-100 text-xs">Stock 100% original Honda.</p>
                </div>
                <div class="bg-[#111827] p-8 rounded-3xl text-center">
                    <h3 class="text-white font-black uppercase mb-2">Asesoría Directa</h3>
                    <a href="https://wa.me/51969979954" class="text-orange-500 font-bold text-xs underline">CHAT DE VENTAS</a>
                </div>
            </div>

            {{-- SEDES --}}
            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-gray-900 uppercase">Nuestras <span class="text-orange-600">Sedes</span></h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                {{-- Sede Nueva Cajamarca --}}
                <div class="bg-white rounded-[2rem] p-8 shadow-md border border-gray-50">
                    <h3 class="text-xl font-black text-gray-900 uppercase mb-1">Nueva Cajamarca</h3>
                    <p class="text-gray-500 text-xs mb-6 italic">Av. Cajamarca Sur N° 541</p>
                    <a href="https://maps.google.com/?q=Av.+Cajamarca+Sur+541+Nueva+Cajamarca" target="_blank" class="block w-full py-4 bg-gray-100 rounded-2xl text-center text-gray-600 font-bold text-xs hover:bg-orange-500 hover:text-white transition-all">
                        VER UBICACIÓN EN EL MAPA
                    </a>
                </div>

                {{-- Sede Moyobamba --}}
                <div class="bg-white rounded-[2rem] p-8 shadow-md border border-gray-50">
                    <h3 class="text-xl font-black text-gray-900 uppercase mb-1">Moyobamba</h3>
                    <p class="text-gray-500 text-xs mb-6 italic">Av. Miguel Grau N° 221</p>
                    <a href="https://maps.google.com/?q=Av.+Miguel+Grau+221+Moyobamba" target="_blank" class="block w-full py-4 bg-gray-100 rounded-2xl text-center text-gray-600 font-bold text-xs hover:bg-orange-500 hover:text-white transition-all">
                        VER UBICACIÓN EN EL MAPA
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>