<nav class="bg-white shadow-lg stick top-0 z-50">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
            <div class="flex-shrink-0">
                <a href="/" class="text-2xl font-bold text-orange-600">SHOP<span class="text-gray-800">PRO</span></a>
            </div>

            <div class="hidden md:flex space-x-8">
                <a href="/" class="text-gray-700 hover:text-orange-600 font-medium">Inicio</a>
                @foreach($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" 
                       class="text-gray-700 hover:text-orange-600 font-medium transition-colors">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            <div class="flex items-center space-x-2">
                <a href="{{ route('cart') }}" id="cart-icon-for-animation" class="relative p-2 text-gray-600 hover:text-orange-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span key="{{ \Cart::getContent()->count() }}" 
                          class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-[10px] font-bold leading-none text-white transform translate-x-1/4 -translate-y-1/4 bg-orange-600 rounded-full animate-bounce-short">
                        {{ \Cart::getContent()->count() }}
                    </span>
                </a>

                <div class="md:hidden">
                    <button onclick="toggleMobileMenu()" class="p-2 text-gray-600 hover:text-orange-600 focus:outline-none">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 px-4 pt-2 pb-4 shadow-inner">
        <a href="/" class="block px-3 py-2 text-base font-bold text-gray-700 hover:bg-orange-50 rounded-md">Inicio</a>
        @foreach($categories as $category)
            <a href="{{ route('category.show', $category->slug) }}" 
               class="block px-3 py-2 text-base font-medium text-gray-700 hover:bg-orange-50 hover:text-orange-600 rounded-md transition-colors">
                {{ $category->name }}
            </a>
        @endforeach
    </div>
</nav>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>
