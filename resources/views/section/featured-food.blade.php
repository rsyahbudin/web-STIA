<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Produk Makanan Unggulan</h2>
            <p class="text-xl text-gray-600">Bahan makanan berkualitas tinggi untuk industri makanan dan minuman</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($featuredFoodProducts as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <i class="fas fa-box text-4xl text-gray-400"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-3 line-clamp-2">{{ Str::limit($product->description, 100) }}</p>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-500">{{ $product->manufacturer }}</span>
                        <span class="text-sm text-gray-500">{{ $product->country }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">{{ $product->price_rupiah }}</span>
                        <a href="{{ route('products.show', $product->id) }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="{{ route('products.index') }}" class="bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                Lihat Semua Produk Makanan
            </a>
        </div>
    </div>
</section>
