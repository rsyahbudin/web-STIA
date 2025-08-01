<nav class="bg-white shadow-lg fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0 flex items-center">
                    @if($companyProfile->logo_url)
                    <img src="{{ asset('storage/' . $companyProfile->logo_url) }}"
                        alt="{{ $companyProfile->company_name ?? 'logo' }}"
                        class="h-10 w-auto mr-3">
                    @endif
                    <h1 class="lg:text-2xl font-bold text-red-600 ">{{ $companyProfile->company_name }}</h1>
                </div>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Home</a>
                <a href="/#about" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">About Us</a>
                <a href="{{ route('catalog.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-300">Product Catalog</a>
                <a href="https://wa.me/{{ $companyProfile->whatsapp ?? '6281804040684' }}" target="_blank" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 transition duration-300">
                    <i class="fab fa-whatsapp mr-2"></i>Chat Now
                </a>
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
            <a href="/" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium transition duration-300">Home</a>
            <a href="/#about" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium transition duration-300">About Us</a>
            <a href="{{ route('catalog.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium transition duration-300">Product Catalog</a>
            <a href="/#contact" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium transition duration-300">Contact</a>
            <a href="https://wa.me/{{ $companyProfile->whatsapp ?? '6281804040684' }}" target="_blank" class="bg-green-600 text-white block px-3 py-2 rounded-md text-base font-medium hover:bg-green-700 transition duration-300">
                <i class="fab fa-whatsapp mr-2"></i>Chat Now
            </a>
        </div>
    </div>
</nav>