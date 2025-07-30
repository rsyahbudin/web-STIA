@extends('layouts.app')

@section('content')
<!-- Header Section -->
<section class="bg-gradient-to-r from-red-600 to-red-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Katalog Produk Makanan</h1>
            <p class="text-xl md:text-2xl mb-8">Bahan makanan berkualitas tinggi untuk industri makanan dan minuman</p>

            <!-- Search Form -->
            <div class="max-w-md mx-auto">
                <form method="GET" action="{{ route('products.index') }}" class="flex">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari produk..."
                        class="flex-1 px-4 py-3 rounded-l-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-300">
                    <button type="submit" class="bg-red-500 hover:bg-red-400 px-6 py-3 rounded-r-lg transition duration-300">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Products Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(request('search'))
        <div class="mb-8">
            <p class="text-gray-600">
                Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                ({{ $products->count() }} produk ditemukan)
            </p>
            <a href="{{ route('products.index') }}" class="text-red-600 hover:text-red-800 text-sm">
                <i class="fas fa-times mr-1"></i> Hapus filter
            </a>
        </div>
        @endif

        @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
                <div class="h-48 bg-gradient-to-br from-red-100 to-white flex items-center justify-center">
                    <i class="fas fa-box text-4xl text-red-600"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-3 text-sm line-clamp-3">{{ Str::limit($product->description, 120) }}</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Produsen:</span>
                            <span class="font-medium">{{ $product->manufacturer }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Negara:</span>
                            <span class="font-medium">{{ $product->country }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Kemasan:</span>
                            <span class="font-medium">{{ $product->packaging }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Ukuran:</span>
                            <span class="font-medium">{{ $product->packing_size }}</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">{{ $product->price_rupiah }}</span>
                        <a href="{{ route('products.show', $product->id) }}"
                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition duration-300 text-sm font-medium">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-2xl font-semibold text-gray-600 mb-2">Produk tidak ditemukan</h3>
            <p class="text-gray-500 mb-6">Coba gunakan kata kunci yang berbeda atau lihat semua produk kami</p>
            <a href="{{ route('products.index') }}" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
                Lihat Semua Produk
            </a>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="bg-red-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Butuh Bantuan Memilih Produk?</h2>
        <p class="text-xl mb-8">Tim ahli kami siap membantu Anda menemukan produk yang tepat untuk kebutuhan bisnis Anda</p>
        <a href="/#contact" class="bg-white text-red-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
            Hubungi Kami
        </a>
    </div>
</section>
@endsection