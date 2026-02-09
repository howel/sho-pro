<x-layouts.app>
    {{-- Header Impactante --}}
    <div class="bg-gray-900 py-32 relative overflow-hidden">
        <div class="absolute inset-0 opacity-30">
            <img src="/images/contact-bg.jpg" class="w-full h-full object-cover" alt="Contacto Salazar">
        </div>
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')]"></div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="text-orange-500 font-black tracking-[0.4em] uppercase text-xs mb-4 block animate-pulse">Concesionario Autorizado Honda</span>
            <h1 class="text-6xl md:text-8xl font-black text-white uppercase tracking-tighter">
                Hablemos <span class="text-orange-500 italic">Hoy</span>
            </h1>
        </div>
    </div>

    <div class="bg-white pb-20">
        <div class="container mx-auto px-4">
            
            {{-- BLOQUES DE ACCIÓN RÁPIDA --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 -mt-16 relative z-20 mb-24">
                
                {{-- Card Ventas (WhatsApp) --}}
                <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl border-t-4 border-green-500 group transition-all duration-300 hover:shadow-green-100">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-12 h-12 bg-green-100 text-green-600 rounded-xl flex items-center justify-center group-hover:bg-green-600 group-hover:text-white transition-all duration-300">
                            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.224-3.82l.454.27c1.464.873 3.15 1.334 4.87 1.335h.005c5.705 0 10.347-4.642 10.35-10.348.001-2.766-1.077-5.365-3.036-7.325-1.957-1.959-4.556-3.037-7.327-3.038-5.708 0-10.35 4.644-10.352 10.351-.001 1.824.477 3.606 1.385 5.176l.296.512-1.107 4.045 4.14-1.086zm10.518-7.333c-.274-.136-1.618-.8-1.869-.891-.252-.091-.434-.136-.617.136-.182.273-.706.891-.866 1.072-.16.181-.32.204-.593.068-.273-.136-1.15-.424-2.19-1.352-.809-.722-1.355-1.614-1.514-1.887-.159-.272-.017-.419.119-.555.123-.122.273-.318.41-.477.136-.159.182-.272.272-.454.091-.181.045-.341-.023-.477-.068-.136-.617-1.487-.845-2.035-.221-.532-.444-.459-.617-.468-.159-.008-.342-.01-.525-.01s-.479.068-.73.341c-.252.272-.96.938-.96 2.289 0 1.35.983 2.655 1.12 2.837.137.181 1.933 2.951 4.685 4.139.654.283 1.165.451 1.562.577.657.21 1.255.18 1.727.11.526-.078 1.618-.661 1.846-1.3.229-.638.229-1.182.16-1.3-.069-.117-.251-.181-.524-.317z"/></svg>
                        </div>
                        <span class="text-[10px] font-black text-green-600 uppercase tracking-widest">Atención Ventas</span>
                    </div>
                    <h3 class="text-xl font-black text-gray-900 uppercase">Ventas y Motos</h3>
                    <p class="text-gray-500 text-sm mt-2 mb-6 leading-relaxed">Cotiza modelos 0km y productos de fuerza con garantía.</p>
                    <a href="https://wa.me/51969979954?text=Hola,%20deseo%20una%20cotización" target="_blank" class="flex items-center justify-center gap-2 w-full bg-gray-900 text-white font-black py-4 rounded-2xl hover:bg-green-600 transition-all uppercase text-[10px] tracking-widest">
                        WhatsApp Ventas
                    </a>
                </div>

                {{-- Card Taller (Herramientas) --}}
                <div class="bg-white p-8 rounded-[2.5rem] shadow-2xl border-t-4 border-orange-500 group transition-all duration-300">
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-12 h-12 bg-orange-100 text-orange-600 rounded-xl flex items-center justify-center group-hover:bg-orange-600 group-hover:text-white transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                        </div>
                        <span class="text-[10px] font-black text-orange-600 uppercase tracking-widest">Servicio Técnico</span>
                    </div>
                    <h3 class="text-xl font-black text-gray-900 uppercase">Taller y Repuestos</h3>
                    <p class="text-gray-500 text-sm mt-2 mb-6 leading-relaxed">Agenda mantenimientos o solicita repuestos genuinos.</p>
                    <a href="https://wa.me/51969979954?text=Hola,%20necesito%20servicio%20técnico" target="_blank" class="flex items-center justify-center gap-2 w-full bg-gray-900 text-white font-black py-4 rounded-2xl hover:bg-orange-600 transition-all uppercase text-[10px] tracking-widest">
                        WhatsApp Taller
                    </a>
                </div>

                {{-- Card Horarios (Reloj) --}}
                <div class="bg-gray-900 p-8 rounded-[2.5rem] shadow-2xl text-white">
                    <div class="w-12 h-12 bg-white/10 text-orange-500 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-black uppercase text-orange-500 mb-4">Horarios</h3>
                    <div class="space-y-3">
                        <div class="flex justify-between text-xs border-b border-white/10 pb-2">
                            <span class="text-gray-400">Lun - Sáb</span>
                            <span class="font-bold">8:00 AM - 6:30 PM</span>
                        </div>
                        <div class="flex justify-between text-xs">
                            <span class="text-gray-400">Domingos</span>
                            <span class="font-bold text-orange-500 uppercase italic">Cerrado</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN SEDES CON MAPAS --}}
            <div class="mb-24">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-black text-gray-900 uppercase">Nuestras <span class="text-orange-600 underline decoration-4 underline-offset-8">Tiendas</span></h2>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                    {{-- Sede Nueva Cajamarca --}}
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-[2rem] border-l-8 border-orange-500 flex items-center justify-between">
                            <div>
                                <h4 class="font-black text-gray-900 uppercase tracking-tight">Sede Principal - Nueva Cajamarca</h4>
                                <p class="text-gray-500 text-sm italic">Av. Cajamarca Sur Nro. 541</p>
                            </div>
                            <svg class="w-8 h-8 text-gray-200" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                        </div>
                        <div class="h-80 rounded-[2.5rem] overflow-hidden shadow-xl border-4 border-white transition-all hover:border-orange-500">
                            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>

                    {{-- Sede Moyobamba --}}
                    <div class="space-y-6">
                        <div class="bg-gray-50 p-6 rounded-[2rem] border-l-8 border-gray-900 flex items-center justify-between">
                            <div>
                                <h4 class="font-black text-gray-900 uppercase tracking-tight">Sucursal Moyobamba</h4>
                                <p class="text-gray-500 text-sm italic">Av. Miguel Grau N° 221</p>
                            </div>
                            <svg class="w-8 h-8 text-gray-200" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"/></svg>
                        </div>
                        <div class="h-80 rounded-[2.5rem] overflow-hidden shadow-xl border-4 border-white transition-all hover:border-orange-500">
                            <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FORMULARIO DISEÑO PREMIUM --}}
            <div class="max-w-6xl mx-auto bg-gray-900 rounded-[4rem] overflow-hidden shadow-3xl flex flex-col md:flex-row border-8 border-gray-100">
                <div class="md:w-2/5 p-12 bg-orange-600 text-white flex flex-col justify-center">
                    <h3 class="text-4xl font-black uppercase leading-none mb-6 italic underline decoration-white/30 underline-offset-4">Envíanos un <br>Mensaje</h3>
                    <p class="text-orange-100 mb-10 font-medium">¿Propuestas comerciales o consultas técnicas complejas? Estamos aquí para escucharte.</p>
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 012-2V7a2 2 0 01-2-2H5a2 2 0 01-2 2v10a2 2 0 012 2z"></path></svg>
                            </div>
                            <span class="font-bold text-sm tracking-tight">salazar.importaciones@gmail.com</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            </div>
                            <span class="font-bold text-sm">+51 969 979 954</span>
                        </div>
                    </div>
                </div>

                <div class="md:w-3/5 p-12 bg-gray-900">
                    <form action="#" method="GET" class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-1">
                            <label class="block text-gray-500 text-[10px] uppercase font-black tracking-widest mb-2 ml-1">Nombre Completo</label>
                            <input type="text" class="w-full bg-gray-800 border-none rounded-2xl px-6 py-4 text-white focus:ring-2 focus:ring-orange-500 outline-none transition-all" placeholder="Juan Pérez">
                        </div>
                        <div class="md:col-span-1">
                            <label class="block text-gray-500 text-[10px] uppercase font-black tracking-widest mb-2 ml-1">Número de Celular</label>
                            <input type="tel" class="w-full bg-gray-800 border-none rounded-2xl px-6 py-4 text-white focus:ring-2 focus:ring-orange-500 outline-none transition-all" placeholder="900 000 000">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-gray-500 text-[10px] uppercase font-black tracking-widest mb-2 ml-1">Tu Mensaje</label>
                            <textarea rows="4" class="w-full bg-gray-800 border-none rounded-2xl px-6 py-4 text-white focus:ring-2 focus:ring-orange-500 outline-none transition-all" placeholder="Escribe tu consulta aquí..."></textarea>
                        </div>
                        <div class="md:col-span-2">
                            <button class="w-full bg-orange-600 text-white font-black py-5 rounded-2xl hover:bg-white hover:text-orange-600 transition-all uppercase tracking-widest text-[11px] shadow-xl shadow-orange-900/20">
                                Enviar Mensaje Directo
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>