<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <h1 class="text-2xl font-bold text-red-600">{{ $companyProfile->company_name }}</h1>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="#home" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                <a href="#about" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Tentang Kami</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Produk Makanan</a>
                <a href="{{ route('apis.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">API</a>
                <a href="#contact" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Kontak</a>
            </div>
            <div class="md:hidden flex items-center">
                <button class="mobile-menu-button">
                    <i class="fas fa-bars text-gray-700"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile menu -->
    <div class="mobile-menu hidden md:hidden">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-white shadow-lg">
            <a href="#home" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
            <a href="#about" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">Tentang Kami</a>
            <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">Produk Makanan</a>
            <a href="{{ route('apis.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">API</a>
            <a href="#contact" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
        </div>
    </div>
</nav>
