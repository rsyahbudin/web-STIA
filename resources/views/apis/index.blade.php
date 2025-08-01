@extends('layouts.app')

@section('content')
<!-- Header Section -->
<section class="bg-gradient-to-r from-green-600 to-blue-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Active Pharmaceutical Ingredients</h1>
            <p class="text-xl md:text-2xl mb-8">Bahan aktif farmasi berkualitas tinggi untuk industri obat-obatan</p>

            <!-- Search Form -->
            <div class="max-w-md mx-auto">
                <form method="GET" action="{{ route('apis.index') }}" class="flex">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari API..."
                        class="flex-1 px-4 py-3 rounded-l-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-300">
                    <button type="submit" class="bg-green-500 hover:bg-green-400 px-6 py-3 rounded-r-lg transition duration-300">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- APIs Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @if(request('search'))
        <div class="mb-8">
            <p class="text-gray-600">
                Menampilkan hasil pencarian untuk: <strong>"{{ request('search') }}"</strong>
                ({{ $apis->count() }} API ditemukan)
            </p>
            <a href="{{ route('apis.index') }}" class="text-green-600 hover:text-green-800 text-sm">
                <i class="fas fa-times mr-1"></i> Hapus filter
            </a>
        </div>
        @endif

        @if($apis->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($apis as $api)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1 border">
                <div class="h-48 bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center">
                    <i class="fas fa-flask text-4xl text-green-600"></i>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2 text-gray-900">{{ $api->name }}</h3>
                    <p class="text-gray-600 mb-3 text-sm line-clamp-3">{{ Str::limit($api->description, 120) }}</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Produsen:</span>
                            <span class="font-medium">{{ $api->manufacturer }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Negara:</span>
                            <span class="font-medium">{{ $api->country }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Kemasan:</span>
                            <span class="font-medium">{{ $api->packaging }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500">Ukuran:</span>
                            <span class="font-medium">{{ $api->packing_size }}</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center">
                        <a href="{{ route('apis.show', $api->id) }}"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300 text-sm font-medium">
                            Detail
                        </a>
                        <a href="https://wa.me/{{ $companyProfile->whatsapp }}?text=Halo, saya tertarik dengan API {{ $api->name }}. Mohon informasi lebih lanjut."
                            target="_blank"
                            class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition duration-300 text-sm font-medium">
                            <i class="fab fa-whatsapp mr-1"></i> Tanya
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16">
            <i class="fas fa-search text-6xl text-gray-300 mb-4"></i>
            <h3 class="text-2xl font-semibold text-gray-600 mb-2">API tidak ditemukan</h3>
            <p class="text-gray-500 mb-6">Coba gunakan kata kunci yang berbeda atau lihat semua API kami</p>
            <a href="{{ route('apis.index') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                Lihat Semua API
            </a>
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="bg-green-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Butuh Bantuan Memilih API?</h2>
        <p class="text-xl mb-8">Tim ahli kami siap membantu Anda menemukan API yang tepat untuk kebutuhan industri obat-obatan Anda</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="/#contact" class="bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                Hubungi Kami
            </a>
            <a href="https://wa.me/{{ $companyProfile->whatsapp }}?text=Halo, saya ingin berkonsultasi tentang API yang tepat untuk kebutuhan industri obat-obatan saya."
                target="_blank"
                class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                <i class="fab fa-whatsapp mr-2"></i>Chat WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection