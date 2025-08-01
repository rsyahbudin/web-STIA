@extends('layouts.app')

@section('content')
<!-- API Detail Section -->
<section class="pt-16 bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- API Image -->
                <div class="p-8">
                    <div class="h-96 bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center rounded-lg">
                        <i class="fas fa-flask text-8xl text-green-600"></i>
                    </div>
                </div>

                <!-- API Info -->
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $api->name }}</h1>
                    <p class="text-gray-600 mb-6 leading-relaxed">{{ $api->description }}</p>

                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 font-medium">Produsen:</span>
                            <span class="text-gray-900">{{ $api->manufacturer }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 font-medium">Negara Asal:</span>
                            <span class="text-gray-900">{{ $api->country }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 font-medium">Kemasan:</span>
                            <span class="text-gray-900">{{ $api->packaging }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 font-medium">Ukuran Kemasan:</span>
                            <span class="text-gray-900">{{ $api->packing_size }}</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://wa.me/{{ $companyProfile->whatsapp }}?text=Halo, saya tertarik dengan API {{ $api->name }}. Mohon informasi lebih lanjut."
                            target="_blank"
                            class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 font-semibold text-center">
                            <i class="fab fa-whatsapp mr-2"></i>Tanya via WhatsApp
                        </a>
                        <a href="tel:{{ $companyProfile->phone }}"
                            class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 font-semibold text-center">
                            <i class="fas fa-phone mr-2"></i>Telepon
                        </a>
                    </div>
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedApis as $relatedApi)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 border">
                <div class="h-32 bg-gradient-to-br from-green-100 to-blue-100 flex items-center justify-center">
                    <i class="fas fa-flask text-2xl text-green-600"></i>
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-2">{{ $relatedApi->name }}</h3>
                    <p class="text-gray-600 text-sm mb-3">{{ Str::limit($relatedApi->description, 80) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $relatedApi->manufacturer }}</span>
                        <a href="{{ route('apis.show', $relatedApi->id) }}" class="bg-green-600 text-white px-3 py-1 rounded text-sm hover:bg-green-700 transition duration-300">
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

<!-- CTA Section -->
<section class="bg-green-600 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">Butuh API Lain?</h2>
        <p class="text-xl mb-8">Kami memiliki berbagai API berkualitas tinggi untuk kebutuhan industri obat-obatan Anda</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('apis.index') }}" class="bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                Lihat Semua API
            </a>
            <a href="https://wa.me/{{ $companyProfile->whatsapp }}?text=Halo, saya ingin melihat katalog API lengkap."
                target="_blank"
                class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                <i class="fab fa-whatsapp mr-2"></i>Chat WhatsApp
            </a>
        </div>
    </div>
</section>
@endsection