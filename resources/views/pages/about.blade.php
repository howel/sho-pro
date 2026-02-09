<x-layouts.app>
    {{-- Header Nosotros --}}
    <div class="bg-gray-900 py-24 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <img src="/images/about-header.jpg" class="w-full h-full object-cover" alt="Historia Salazar" onerror="this.src='https://images.unsplash.com/photo-1558981806-ec527fa84c39?auto=format&fit=crop&q=80&w=1600'">
        </div>
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/50 to-gray-900"></div>
        
        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="text-orange-500 font-black tracking-[0.4em] uppercase text-xs mb-4 block animate-pulse">Concesionario Autorizado Honda</span>
            <h1 class="text-6xl md:text-8xl font-black text-white uppercase tracking-tighter">
                Nuestra <span class="text-orange-500 italic">Esencia</span>
            </h1>
        </div>
    </div>

    <div class="bg-white py-20">
        <div class="container mx-auto px-4">
            
            {{-- Bloque de Historia con Sello de RUC --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start mb-28">
                
                {{-- LADO IZQUIERDO: IMAGEN Y BADGE DE RUC --}}
                <div class="relative group pt-6">
                    <div class="bg-gray-100 rounded-[3rem] overflow-hidden shadow-2xl border-8 border-gray-50 h-[550px]">
                        <img src="/images/tienda-salazar.jpg" 
                             class="w-full h-full object-cover transition duration-700 group-hover:scale-105" 
                             alt="Tienda Importaciones Salazar" 
                             onerror="this.src='https://images.unsplash.com/photo-1568772585407-9361f9bf3a87?auto=format&fit=crop&q=80&w=800'">
                    </div>
                    
                    {{-- Badge de RUC --}}
                    <div class="absolute -top-6 -left-4 md:-left-8 z-20 bg-white p-6 rounded-[2.5rem] shadow-2xl border-l-[10px] border-orange-500 max-w-[300px]">
                        <p class="text-[9px] font-black text-gray-400 uppercase tracking-[0.2em] mb-1">Identidad Corporativa</p>
                        <p class="text-[13px] font-black text-gray-900 uppercase leading-tight mb-4">Importaciones Salazar E.I.R.L.</p>
                        <div class="flex items-center gap-3 bg-gray-50 p-3 rounded-2xl">
                            <div class="bg-orange-600 text-white text-[10px] font-black px-2 py-1 rounded-md">RUC</div>
                            <span class="text-sm font-mono font-bold text-gray-700 tracking-tight">20450439593</span>
                        </div>
                    </div>

                    {{-- Badge de Años --}}
                    <div class="absolute -bottom-8 -right-4 md:-right-8 z-20 bg-gray-900 p-8 rounded-[2.5rem] shadow-2xl text-center">
                        <span class="text-orange-500 text-5xl font-black block leading-none">17</span>
                        <span class="text-white text-[10px] font-black uppercase tracking-[0.2em]">Años de Historia</span>
                    </div>
                </div>

                {{-- LADO DERECHO: TEXTO INFORMATIVO --}}
                <div class="space-y-8 lg:pt-12">
                    <div>
                        <h2 class="text-5xl md:text-6xl font-black text-gray-900 uppercase leading-[0.9] mb-6 tracking-tighter">
                            Liderazgo que <br><span class="text-orange-600">Trasciende</span>
                        </h2>
                        <div class="w-24 h-2 bg-orange-500 rounded-full"></div>
                    </div>

                    <div class="space-y-6">
                        <p class="text-gray-600 text-xl leading-relaxed font-bold italic">
                            "Iniciamos un camino de confianza el 07 de abril de 2009."
                        </p>
                        <p class="text-gray-500 text-lg leading-relaxed font-medium">
                            Bajo la visión estratégica de nuestro fundador y gerente general, <span class="text-gray-900 font-black uppercase">Andrés Salazar Díaz</span>, Importaciones Salazar nació para revolucionar la movilidad en el Alto Mayo.
                        </p>
                    </div>

                    {{-- Indicadores Rápidos --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 border-y border-gray-100 py-10">
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-gray-100 text-gray-900 rounded-2xl flex items-center justify-center shrink-0">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Fundación</p>
                                <p class="text-md font-black text-gray-800 tracking-tight">07 / 04 / 2009</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-14 h-14 bg-orange-100 text-orange-600 rounded-2xl flex items-center justify-center shrink-0">
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] text-gray-400 font-black uppercase tracking-widest">Estado Sunat</p>
                                <p class="text-md font-black text-gray-800 tracking-tight italic uppercase">Activo y Habido</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN DE FRASE DEL GERENTE --}}
            <div class="bg-gray-900 p-12 md:p-24 rounded-[4rem] text-center relative overflow-hidden mb-28 shadow-3xl">
                <div class="absolute top-0 right-0 w-96 h-96 bg-orange-600 opacity-10 rounded-full blur-[120px]"></div>
                <div class="relative z-10">
                    <h3 class="text-3xl md:text-5xl font-black text-white uppercase mb-10 leading-tight italic tracking-tighter">
                        "En Salazar no solo entregamos una llave, <br class="hidden md:block"> brindamos una promesa de respaldo incondicional."
                    </h3>
                    <div class="inline-block border-t border-orange-500/30 pt-6">
                        <p class="text-white font-black uppercase tracking-[0.4em] text-sm">Andrés Salazar Díaz</p>
                        <p class="text-orange-500 font-bold text-xs uppercase italic mt-2 tracking-widest">Gerente General & Fundador</p>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN: PREGUNTAS FRECUENTES (FAQ) ACTUALIZADA --}}
            <div class="max-w-5xl mx-auto">
                <div class="text-center mb-16">
                    <span class="text-orange-600 font-black uppercase text-xs tracking-[0.3em]">Centro de Soluciones</span>
                    <h2 class="text-4xl md:text-5xl font-black text-gray-900 uppercase mt-2">Dudas <span class="text-gray-400 italic">Resueltas</span></h2>
                    <p class="text-gray-500 mt-4 font-medium">Todo lo que necesitas saber sobre Importaciones Salazar.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Columna 1 --}}
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-[2rem] p-8 border border-transparent hover:border-orange-200 transition-all">
                            <details class="group">
                                <summary class="flex justify-between items-center font-black text-gray-900 uppercase text-sm tracking-tight cursor-pointer list-none">
                                    ¿Tienen financiamiento para Motos?
                                    <span class="text-orange-500 group-open:rotate-180 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                    </span>
                                </summary>
                                <p class="text-gray-600 mt-6 text-sm leading-relaxed">
                                    Sí, facilitamos el acceso a tu Honda mediante convenios con financieras locales y evaluación directa. Te ayudamos a gestionar tu crédito de forma rápida.
                                </p>
                            </details>
                        </div>

                        <div class="bg-gray-50 rounded-[2rem] p-8 border border-transparent hover:border-orange-200 transition-all">
                            <details class="group">
                                <summary class="flex justify-between items-center font-black text-gray-900 uppercase text-sm tracking-tight cursor-pointer list-none">
                                    ¿Qué garantía tienen los Equipos de Fuerza?
                                    <span class="text-orange-500 group-open:rotate-180 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                    </span>
                                </summary>
                                <p class="text-gray-600 mt-6 text-sm leading-relaxed">
                                    Todos nuestros motores, motobombas y generadores Honda cuentan con garantía oficial de fábrica. Además, te entregamos el equipo probado y con su primera inducción de uso.
                                </p>
                            </details>
                        </div>

                        <div class="bg-gray-50 rounded-[2rem] p-8 border border-transparent hover:border-orange-200 transition-all">
                            <details class="group">
                                <summary class="flex justify-between items-center font-black text-gray-900 uppercase text-sm tracking-tight cursor-pointer list-none">
                                    ¿Hacen envíos a otras ciudades?
                                    <span class="text-orange-500 group-open:rotate-180 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                    </span>
                                </summary>
                                <p class="text-gray-600 mt-6 text-sm leading-relaxed">
                                    Realizamos envíos de repuestos y equipos de fuerza a todo el departamento de San Martín y regiones vecinas. Coordinamos con agencias de confianza para que tu pedido llegue seguro.
                                </p>
                            </details>
                        </div>
                    </div>

                    {{-- Columna 2 --}}
                    <div class="space-y-4">
                        <div class="bg-gray-50 rounded-[2rem] p-8 border border-transparent hover:border-orange-200 transition-all">
                            <details class="group">
                                <summary class="flex justify-between items-center font-black text-gray-900 uppercase text-sm tracking-tight cursor-pointer list-none">
                                    ¿Ofrecen servicio de mantenimiento?
                                    <span class="text-orange-500 group-open:rotate-180 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                    </span>
                                </summary>
                                <p class="text-gray-600 mt-6 text-sm leading-relaxed">
                                    Contamos con Talleres Autorizados en Nueva Cajamarca y Moyobamba. Nuestros mecánicos son capacitados por Honda Perú para asegurar un diagnóstico preciso y un mantenimiento de calidad.
                                </p>
                            </details>
                        </div>

                        <div class="bg-gray-50 rounded-[2rem] p-8 border border-transparent hover:border-orange-200 transition-all">
                            <details class="group">
                                <summary class="flex justify-between items-center font-black text-gray-900 uppercase text-sm tracking-tight cursor-pointer list-none">
                                    ¿Venden repuestos al por mayor?
                                    <span class="text-orange-500 group-open:rotate-180 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                    </span>
                                </summary>
                                <p class="text-gray-600 mt-6 text-sm leading-relaxed">
                                    Sí, atendemos pedidos de repuestos originales al por mayor para tiendas y talleres independientes que buscan garantizar calidad japonesa a sus propios clientes.
                                </p>
                            </details>
                        </div>

                        <div class="bg-gray-50 rounded-[2rem] p-8 border border-transparent hover:border-orange-200 transition-all">
                            <details class="group">
                                <summary class="flex justify-between items-center font-black text-gray-900 uppercase text-sm tracking-tight cursor-pointer list-none">
                                    ¿Cómo puedo solicitar una cotización?
                                    <span class="text-orange-500 group-open:rotate-180 transition-transform">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M19 9l-7 7-7-7"></path></svg>
                                    </span>
                                </summary>
                                <p class="text-gray-600 mt-6 text-sm leading-relaxed">
                                    Puedes escribirnos directamente a nuestro WhatsApp de Ventas, llamarnos o visitarnos en nuestras tiendas. Te responderemos al instante con precios y fichas técnicas.
                                </p>
                            </details>
                        </div>
                    </div>
                </div>
                
                {{-- CTA Final --}}
                <div class="mt-12 text-center">
                    <p class="text-gray-400 text-xs font-bold uppercase tracking-widest">¿Tienes otra duda?</p>
                    <a href="/contacto" class="inline-block mt-4 text-orange-600 font-black uppercase text-sm border-b-2 border-orange-600 pb-1 hover:text-gray-900 hover:border-gray-900 transition-all">Contáctanos directamente</a>
                </div>
            </div>

        </div>
    </div>
</x-layouts.app>