<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $api->name }} - PT Setia Tritunggal Inti Artha</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <a href="/" class="text-2xl font-bold text-red-600">PT Setia Tritunggal Inti Artha</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="/" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                    <a href="/#about" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Tentang Kami</a>
                    <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Produk Makanan</a>
                    <a href="{{ route('apis.index') }}" class="text-red-600 px-3 py-2 rounded-md text-sm font-medium">API</a>
                    <a href="/#contact" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">Kontak</a>
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
                <a href="/" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                <a href="/#about" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">Tentang Kami</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">Produk Makanan</a>
                <a href="{{ route('apis.index') }}" class="text-red-600 block px-3 py-2 rounded-md text-base font-medium">API</a>
                <a href="/#contact" class="text-gray-700 hover:text-red-600 block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
            </div>
        </div>
    </nav>

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
                            <a href="{{ route('apis.index') }}" class="text-gray-700 hover:text-red-600">Active Pharmaceutical Ingredients</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                            <span class="text-gray-500">{{ $api->name }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- API Detail -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- API Image -->
                <div class="space-y-4">
                    <div class="aspect-square bg-gradient-to-br from-red-100 to-white rounded-lg flex items-center justify-center border-l-4 border-red-500">
                        <i class="fas fa-flask text-8xl text-red-600"></i>
                    </div>
                    
                    <!-- Safety Notice -->
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    <strong>Perhatian:</strong> Produk ini adalah bahan aktif farmasi yang hanya boleh digunakan oleh industri farmasi berlisensi.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- API Info -->
                <div class="space-y-6">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $api->name }}</h1>
                        <p class="text-2xl font-bold text-red-600 mb-6">{{ $api->price_rupiah }}</p>
                    </div>

                    <div class="prose max-w-none">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Deskripsi API</h3>
                        <p class="text-gray-700 leading-relaxed">{{ $api->description }}</p>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Spesifikasi Produk</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="font-medium text-gray-600">Produsen:</span>
                                <span class="text-gray-900">{{ $api->manufacturer }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="font-medium text-gray-600">Negara Asal:</span>
                                <span class="text-gray-900">{{ $api->country }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="font-medium text-gray-600">Kemasan:</span>
                                <span class="text-gray-900">{{ $api->packaging }}</span>
                            </div>
                            <div class="flex justify-between py-2 border-b border-gray-200">
                                <span class="font-medium text-gray-600">Ukuran Kemasan:</span>
                                <span class="text-gray-900">{{ $api->packing_size }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Quality Assurance -->
                    <div class="bg-red-50 rounded-lg p-6 border border-red-200">
                        <h3 class="text-lg font-semibold text-red-800 mb-3">
                            <i class="fas fa-certificate mr-2"></i>
                            Jaminan Kualitas
                        </h3>
                        <ul class="space-y-2 text-sm text-red-700">
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2 text-red-600"></i>
                                Tersertifikasi GMP (Good Manufacturing Practice)
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2 text-red-600"></i>
                                Memenuhi standar USP/EP/BP
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2 text-red-600"></i>
                                Certificate of Analysis (CoA) tersedia
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-check-circle mr-2 text-red-600"></i>
                                Cold chain distribution
                            </li>
                        </ul>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="/#contact" class="flex-1 bg-red-600 text-white text-center px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition duration-300">
                            <i class="fas fa-phone mr-2"></i>
                            Konsultasi & Pemesanan
                        </a>
                        <a href="{{ route('apis.index') }}" class="flex-1 border border-gray-300 text-gray-700 text-center px-6 py-3 rounded-lg font-semibold hover:bg-gray-50 transition duration-300">
                            <i class="fas fa-arrow-left mr-2"></i>
                            Kembali ke Katalog
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related APIs -->
    @if($relatedApis->count() > 0)
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">API Terkait</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedApis as $relatedApi)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 border-l-4 border-red-500">
                    <div class="h-48 bg-gradient-to-br from-red-100 to-white flex items-center justify-center">
                        <i class="fas fa-flask text-4xl text-red-600"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-2">{{ $relatedApi->name }}</h3>
                        <p class="text-gray-600 mb-3 text-sm">{{ Str::limit($relatedApi->description, 80) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold text-red-600">{{ $relatedApi->price_rupiah }}</span>
                            <a href="{{ route('apis.show', $relatedApi->id) }}" class="bg-red-600 text-white px-3 py-1 rounded text-sm hover:bg-red-700 transition duration-300">
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

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h3 class="text-2xl font-bold mb-2">PT Setia Tritunggal Inti Artha</h3>
                <p class="text-gray-400 mb-4">Penyedia terpercaya produk makanan dan API berkualitas tinggi</p>
                <p class="text-gray-500">&copy; 2024 PT Setia Tritunggal Inti Artha. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>