<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
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

<!-- About Section -->
<section id="about" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Tentang {{ $companyProfile->company_name }}</h2>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                {{ $companyProfile->company_description }}
            </p>
        </div>

        @if($companyProfile->vision || $companyProfile->mission)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-16">
            @if($companyProfile->vision)
            <div class="bg-red-50 p-8 rounded-lg border-l-4 border-red-600">
                <h3 class="text-2xl font-bold text-red-600 mb-4">
                    <i class="fas fa-eye mr-2"></i>Visi
                </h3>
                <p class="text-gray-700 leading-relaxed">{{ $companyProfile->vision }}</p>
            </div>
            @endif

            @if($companyProfile->mission)
            <div class="bg-gray-50 p-8 rounded-lg border-l-4 border-gray-600">
                <h3 class="text-2xl font-bold text-gray-600 mb-4">
                    <i class="fas fa-bullseye mr-2"></i>Misi
                </h3>
                <p class="text-gray-700 leading-relaxed">{{ $companyProfile->mission }}</p>
            </div>
            @endif
        </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-award text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Kualitas Terjamin</h3>
                <p class="text-gray-600">Semua produk kami telah tersertifikasi dan memenuhi standar internasional</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-red-600">
                    <i class="fas fa-shipping-fast text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Pengiriman Cepat</h3>
                <p class="text-gray-600">Jaringan distribusi yang luas memastikan pengiriman tepat waktu</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-handshake text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Layanan Terpercaya</h3>
                <p class="text-gray-600">Tim profesional siap memberikan layanan terbaik untuk kebutuhan Anda</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Food Products -->
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

<!-- Featured APIs -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Active Pharmaceutical Ingredients</h2>
            <p class="text-xl text-gray-600">Bahan aktif farmasi berkualitas tinggi untuk industri obat-obatan</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @foreach($featuredApis as $api)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 border">
                <div class="h-48 bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center">
                    <i class="fas fa-flask text-4xl text-green-600"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">{{ $api->name }}</h3>
                    <p class="text-gray-600 mb-3 line-clamp-2">{{ Str::limit($api->description, 100) }}</p>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-sm text-gray-500">{{ $api->manufacturer }}</span>
                        <span class="text-sm text-gray-500">{{ $api->country }}</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">{{ $api->price_rupiah }}</span>
                        <a href="{{ route('apis.show', $api->id) }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition duration-300">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('apis.index') }}" class="bg-red-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                Lihat Semua API
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Hubungi Kami</h2>
            <p class="text-xl text-gray-300">Siap melayani kebutuhan bisnis Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-red-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-map-marker-alt text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Alamat</h3>
                <p class="text-gray-300">{{ $companyProfile->address }}</p>
            </div>

            <div class="text-center">
                <div class="bg-red-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-phone text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Telepon</h3>
                <p class="text-gray-300">{{ $companyProfile->phone }}</p>
            </div>

            <div class="text-center">
                <div class="bg-red-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-envelope text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Email</h3>
                <p class="text-gray-300">{{ $companyProfile->email }}</p>
            </div>
        </div>
    </div>
</section>
@endsection