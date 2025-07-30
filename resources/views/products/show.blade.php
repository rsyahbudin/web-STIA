@extends('layouts.app')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="/" class="text-gray-700 hover:text-red-600 inline-flex items-center">
                        <i class="fas fa-home mr-2"></i>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600">Produk Makanan</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <span class="text-gray-500">{{ $product->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
</div>

<!-- Product Detail -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="space-y-4">
                <div class="aspect-square bg-gradient-to-br from-red-100 to-white rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-8xl text-red-600"></i>
                </div>
            </div>

            <!-- Product Info -->
            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                    <p class="text-2xl font-bold text-red-600 mb-6">{{ $product->price_rupiah }}</p>
                </div>

                <div class="prose max-w-none">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi Produk</h3>
                    <p class="text-gray-700 leading-relaxed">{{ $product->description }}</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Spesifikasi Produk</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="font-medium text-gray-600">Produsen:</span>
                            <span class="text-gray-900">{{ $product->manufacturer }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="font-medium text-gray-600">Negara Asal:</span>
                            <span class="text-gray-900">{{ $product->country }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="font-medium text-gray-600">Kemasan:</span>
                            <span class="text-gray-900">{{ $product->packaging }}</span>
                        </div>
                        <div class="flex justify-between py-2 border-b border-gray-200">
                            <span class="font-medium text-gray-600">Ukuran Kemasan:</span>
                            <span class="text-gray-900">{{ $product->packing_size }}</span>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="/#contact" class="flex-1 bg-red-600 text-white text-center px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                        <i class="fas fa-phone mr-2"></i>
                        Hubungi untuk Pemesanan
                    </a>
                    <a href="{{ route('products.index') }}" class="flex-1 border border-gray-300 text-gray-700 text-center px-6 py-3 rounded-lg font-semibold hover:bg-gray-50 transition duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali ke Katalog
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Produk Terkait</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $relatedProduct)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                <div class="h-48 bg-gradient-to-br from-red-100 to-white flex items-center justify-center">
                    <i class="fas fa-box text-4xl text-red-600"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold mb-2">{{ $relatedProduct->name }}</h3>
                    <p class="text-gray-600 mb-3 text-sm">{{ Str::limit($relatedProduct->description, 80) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">{{ $relatedProduct->price_rupiah }}</span>
                        <a href="{{ route('products.show', $relatedProduct->id) }}" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition duration-300">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection