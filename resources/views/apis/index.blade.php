@extends('layouts.app')

@section('content')


<!-- Header Section -->
<section class="bg-gradient-to-r from-red-600 to-red-800 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Active Pharmaceutical Ingredients</h1>
            <p class="text-xl md:text-2xl mb-8">Bahan aktif farmasi berkualitas tinggi untuk industri obat-obatan</p>

            <!-- Search Form -->
            <div class="max-w-md mx-auto">
                <form method="GET" action="{{ route('apis.index') }}" class="flex">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari API..."
                        class="flex-1 px-4 py-3 rounded-l-lg text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-300">
                    <button type="submit" class="bg-red-500 hover:bg-red-400 px-6 py-3 rounded-r-lg transition duration-300">
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
            <a href="{{ route('apis.index') }}" class="text-red-600 hover:text-red-800 text-sm">
                <i class="fas fa-times mr-1"></i> Hapus filter
            </a>
        </div>
        @endif

        @if($apis->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($apis as $api)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-1 border-l-4 border-red-500">
                <div class="h-48 bg-gradient-to-br from-red-100 to-white flex items-center justify-center">
                    <i class="fas fa-flask text-4xl text-red-600"></i>
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
                        <span class="text-lg font-bold text-red-600">{{ $api->price_rupiah }}</span>
                        <a href="{{ route('apis.show', $api->id) }}"
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
            <h3 class="text-2xl font-semibold text-gray-600 mb-2">API tidak ditemukan</h3>
            <p class="text-gray-500 mb-6">Coba gunakan kata kunci yang berbeda atau lihat semua API kami</p>
            <a href="{{ route('apis.index') }}" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
                Lihat Semua API
            </a>
        </div>
        @endif
    </div>
</section>

<!-- Info Section -->
<section class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih API dari PT Gepi Pharma?</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-certificate text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Sertifikasi Lengkap</h3>
                <p class="text-gray-600">Semua API telah tersertifikasi GMP, FDA, dan standar internasional lainnya</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-white w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 border-2 border-red-600">
                    <i class="fas fa-microscope text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Kontrol Kualitas Ketat</h3>
                <p class="text-gray-600">Setiap batch melalui pengujian laboratorium yang komprehensif</p>
            </div>

            <div class="text-center p-6">
                <div class="bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-truck text-red-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-2">Cold Chain Distribution</h3>
                <p class="text-gray-600">Sistem distribusi dengan kontrol suhu untuk menjaga stabilitas produk</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-red-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Butuh Konsultasi untuk API Khusus?</h2>
        <p class="text-xl mb-8">Tim farmasis ahli kami siap membantu Anda menemukan API yang tepat untuk formulasi obat Anda</p>
        <a href="/#contact" class="bg-white text-red-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
            Konsultasi Sekarang
        </a>
    </div>
</section>
@endsection