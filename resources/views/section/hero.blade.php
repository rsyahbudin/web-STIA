<section id="home" class="pt-16 bg-gradient-to-r from-red-600 to-red-800 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ $companyProfile->hero_title }}
            </h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto">
                {{ $companyProfile->hero_subtitle }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="bg-white text-red-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                    Lihat Produk Makanan
                </a>
                <a href="{{ route('apis.index') }}" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-red-600 transition duration-300">
                    Lihat API
                </a>
            </div>
        </div>
    </div>
</section>
