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
