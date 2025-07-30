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
