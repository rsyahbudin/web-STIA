<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- Kolom 1: Info Perusahaan -->
            <div class="lg:col-span-2">
                <h3 class="text-xl font-bold mb-3">
                    {{ $companyProfile->company_name ?? 'PT Food Solutions Indonesia' }}
                </h3>
                <p class="text-gray-400 text-sm leading-relaxed pr-4">
                    {{ $companyProfile->hero_subtitle ?? 'Perusahaan terdepan dalam distribusi bahan makanan berkualitas tinggi untuk industri makanan dan minuman di Indonesia.' }}
                </p>
            </div>

            <!-- Kolom 2: Info Kontak -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Information</h4>
                <ul class="space-y-3 text-sm">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt text-gray-400 mt-1 mr-3 w-4 text-center"></i>
                        <span class="text-gray-300">{{ $companyProfile->address ?? 'Jl. Sudirman No. 123, Jakarta' }}</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-phone text-gray-400 mt-1 mr-3 w-4 text-center"></i>
                        <a href="tel:{{ $companyProfile->phone ?? '+622112345678' }}" class="text-gray-300 hover:text-white transition">
                            {{ $companyProfile->phone ?? '+62 21 1234 5678' }}
                        </a>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-envelope text-gray-400 mt-1 mr-3 w-4 text-center"></i>
                        <a href="mailto:{{ $companyProfile->email ?? 'info@foodsolutions.co.id' }}" class="text-gray-300 hover:text-white transition">
                            {{ $companyProfile->email ?? 'info@foodsolutions.co.id' }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Kolom 3: Hubungi & Ikuti Kami -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Contact Us</h4>
                <div class="flex flex-col space-y-3">
                    <a href="https://wa.me/{{ $companyProfile->whatsapp ?? '6281804040684' }}" target="_blank"
                        class="bg-green-600 px-4 py-2 text-sm rounded-md flex items-center justify-center hover:bg-green-700 transition transform hover:scale-105">
                        <i class="fab fa-whatsapp text-lg mr-2"></i>
                        <span>Chat on WhatsApp</span>
                    </a>
                    <a href="mailto:{{ $companyProfile->email ?? 'info@foodsolutions.co.id' }}"
                        class="bg-blue-600 px-4 py-2 text-sm rounded-md flex items-center justify-center hover:bg-blue-700 transition transform hover:scale-105">
                        <i class="fas fa-envelope text-lg mr-2"></i>
                        <span>Send Email</span>
                    </a>
                </div>
            </div>

        </div>

        <!-- Bagian Copyright -->
        <div class="border-t border-gray-800 mt-10 pt-6">
            <div class="text-center">
                <p class="text-gray-400 text-sm">
                    © {{ date('Y') }} {{ $companyProfile->company_name ?? 'PT Food Solutions Indonesia' }}. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</footer>