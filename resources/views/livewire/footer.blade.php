<footer class="bg-[#0f172a] text-gray-400 pt-16 pb-8 mt-20 border-t border-white/5">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
            
            @php
                // Intentamos obtener valores, con fallbacks (respaldos) seguros
                $footerLogo = \App\Models\Setting::getVal('site_logo_footer');
                $phone      = \App\Models\Setting::getVal('site_phone', '969 979 954');
                $address    = \App\Models\Setting::getVal('site_address', 'Av. Cajamarca Sur N° 541, Nueva Cajamarca');
                $email      = \App\Models\Setting::getVal('site_email', 'ventas@importacionessalazar.com');

                // Limpieza de teléfono para WhatsApp
                $cleanPhone = preg_replace('/[^0-9]/', '', (string)$phone);
            @endphp

            {{-- 1. Identidad --}}
            <div class="space-y-6">
                <a href="/" class="block">
                    @if($footerLogo && file_exists(public_path('storage/' . $footerLogo)))
                        <img src="{{ asset('storage/' . $footerLogo) }}" alt="Logo Salazar" class="h-10 w-auto object-contain">
                    @else
                        <span class="text-2xl font-black text-white uppercase tracking-tighter">
                            SALAZAR<span class="text-orange-500 italic">.</span>
                        </span>
                    @endif
                </a>
                <p class="text-xs leading-relaxed uppercase font-bold tracking-wider opacity-60">
                    Concesionario Autorizado Honda. <br>
                    Liderando la movilidad y el agro en el Alto Mayo desde 2009.
                </p>
                <div class="pt-2">
                    <span class="text-[10px] font-black text-gray-500 uppercase tracking-[0.2em] block mb-1">RUC</span>
                    <span class="text-sm font-mono text-gray-300">20450439593</span>
                </div>
            </div>

            {{-- 2. Enlaces Rápidos --}}
            <div>
                <h4 class="text-white font-black mb-6 uppercase text-xs tracking-[0.2em]">Explorar</h4>
                <ul class="space-y-3 text-xs font-bold uppercase tracking-widest">
                    <li><a href="/" class="hover:text-orange-500 transition-colors">Inicio</a></li>
                    <li><a href="/nosotros" class="hover:text-orange-500 transition-colors">Nosotros</a></li>
                    <li><a href="/servicios" class="hover:text-orange-500 transition-colors">Servicios</a></li>
                    <li><a href="/contacto" class="hover:text-orange-500 transition-colors">Contacto</a></li>
                </ul>
            </div>

            {{-- 3. Contacto Directo --}}
            <div>
                <h4 class="text-white font-black mb-6 uppercase text-xs tracking-[0.2em]">Soporte</h4>
                <ul class="space-y-4 text-xs">
                    <li class="flex items-start gap-3">
                        <span class="text-orange-500">📍</span>
                        <span class="font-medium">{{ $address }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-orange-500">📞</span>
                        <a href="https://wa.me/51{{ $cleanPhone }}" target="_blank" class="hover:text-white transition-colors font-bold">
                            {{ $phone }}
                        </a>
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-orange-500">✉️</span>
                        <a href="mailto:{{ $email }}" class="hover:text-white transition-colors font-medium lowercase italic">{{ $email }}</a>
                    </li>
                </ul>
            </div>

            {{-- 4. Redes Sociales --}}
            <div>
                <h4 class="text-white font-black mb-6 uppercase text-xs tracking-[0.2em]">Comunidad</h4>
                <div class="flex gap-4">
                    <a href="https://facebook.com" target="_blank" class="w-10 h-10 bg-white/5 rounded-xl flex items-center justify-center hover:bg-orange-600 transition-all group">
                        <svg class="w-5 h-5 fill-current text-gray-400 group-hover:text-white" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-2.201c0-1.137.272-1.697 1.347-1.697h2.653v-4h-3.378c-3.618 0-5.622 1.638-5.622 4.646v3.252z"/></svg>
                    </a>
                    {{-- Puedes agregar más redes aquí --}}
                </div>
                <div class="mt-8 bg-orange-600/10 border border-orange-500/20 p-4 rounded-2xl">
                    <p class="text-[10px] text-orange-500 font-black uppercase tracking-widest mb-1">Horario de Atención</p>
                    <p class="text-white text-[11px] font-bold">Lun - Sáb: 8:00 AM - 6:00 PM</p>
                </div>
            </div>
        </div>

        <div class="border-t border-white/5 pt-8 flex flex-col md:row justify-between items-center gap-4">
            <p class="text-[10px] font-black uppercase tracking-[0.3em] opacity-40">
                &copy; {{ date('Y') }} IMPORTACIONES SALAZAR E.I.R.L.
            </p>
            <div class="flex gap-4 opacity-40 grayscale hover:grayscale-0 transition-all">
                {{-- Logo de Honda o icono pequeño --}}
                <span class="text-[9px] font-black border border-white px-2 py-1 rounded text-white">CONCESIONARIO AUTORIZADO</span>
            </div>
        </div>
    </div>
</footer>