{{-- Importante: El componente debe tener un solo elemento raíz --}}
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-20">
            
            {{-- 1. SECCIÓN DEL LOGO --}}
            <div class="flex-shrink-0">
                @php $logo = \App\Models\Setting::getVal('site_logo'); @endphp
                <a href="/" class="flex items-center group">
                    @if($logo)
                        <img src="{{ asset('storage/' . $logo) }}" alt="Logo" class="h-12 w-auto object-contain transition-transform group-hover:scale-105">
                    @else
                        <span class="text-2xl font-black uppercase tracking-tighter text-gray-900">
                            SALAZAR<span class="text-orange-500 italic">.</span>
                        </span>
                    @endif
                </a>
            </div>

            {{-- 2. MENÚ DESKTOP --}}
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-[11px] font-black uppercase tracking-[0.2em] {{ request()->is('/') ? 'text-orange-600' : 'text-gray-500 hover:text-orange-600' }}">Inicio</a>
                <a href="{{ route('about') }}" class="text-[11px] font-black uppercase tracking-[0.2em] {{ request()->is('nosotros*') ? 'text-orange-600' : 'text-gray-500 hover:text-orange-600' }}">Nosotros</a>
                
                <a href="{{ route('tienda') }}" class="flex items-center gap-2 bg-gray-900 text-white px-6 py-2.5 rounded-full text-[11px] font-black uppercase tracking-[0.2em] hover:bg-orange-600 transition-all transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    Tienda
                </a>

                <a href="{{ route('services') }}" class="text-[11px] font-black uppercase tracking-[0.2em] {{ request()->is('servicios*') ? 'text-orange-600' : 'text-gray-500 hover:text-orange-600' }}">Servicios</a>
                <a href="{{ route('contact') }}" class="text-[11px] font-black uppercase tracking-[0.2em] {{ request()->is('contacto*') ? 'text-orange-600' : 'text-gray-500 hover:text-orange-600' }}">Contacto</a>
            </div>

            {{-- 3. ICONOS Y ACCIONES --}}
            <div class="flex items-center space-x-4">
                <a href="{{ route('cart') }}" class="relative p-2 text-gray-700 hover:text-orange-600 transition-colors group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 transition-transform group-hover:rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    
                    {{-- El contador dinámico --}}
                    {{-- Busca esta parte en tu navigation.blade.php --}}
                    @if($total_count > 0)
                        <span wire:key="nav-cart-{{ $total_count }}" 
                            class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 text-[10px] font-black text-white bg-orange-600 rounded-full ring-2 ring-white animate-bounce">
                            {{ $total_count }}
                        </span>
                    @endif
                </a>

                <button onclick="toggleMobileMenu()" class="md:hidden p-2 text-gray-900">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                </button>
            </div>
        </div>
    </div>

    {{-- MENÚ MÓVIL --}}
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 shadow-2xl absolute w-full left-0">
        <div class="px-6 py-8 space-y-4">
            <a href="/" class="block text-sm font-black uppercase tracking-widest text-gray-900 border-l-4 border-orange-500 pl-4">Inicio</a>
            <a href="{{ route('tienda') }}" class="block text-sm font-black uppercase tracking-widest text-orange-600 pl-4 italic">Tienda</a>
            <a href="{{ route('contact') }}" class="block text-sm font-black uppercase tracking-widest text-gray-500 pl-4">Contacto</a>
        </div>
    </div>
</nav>