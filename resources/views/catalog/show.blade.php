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
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
                        <a href="{{ route('catalog.index', ['tab' => $type]) }}" class="text-gray-700 hover:text-red-600">
                            {{ $type === 'food' ? 'Food Products' : 'Active Pharmaceutical Ingredients' }}
                        </a>
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

<!-- Product Detail Section -->
<section class="pt-16 bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Image -->
                <div class="p-8">
                    <div class="h-96 {{ $type === 'food' ? 'bg-gradient-to-br from-red-50 to-red-100' : 'bg-gradient-to-br from-green-50 to-green-100' }} flex items-center justify-center rounded-lg relative overflow-hidden">
                        <div class="text-center">
                            <div class="mb-4">
                                <span class="{{ $type === 'food' ? 'bg-red-600' : 'bg-green-600' }} text-white px-4 py-2 rounded-full text-sm font-medium">
                                    {{ $type === 'food' ? 'Food Product' : 'API Product' }}
                                </span>
                            </div>
                            <h2 class="text-2xl font-bold {{ $type === 'food' ? 'text-red-600' : 'text-green-600' }} mb-2">
                                {{ $product->name }}
                            </h2>
                            <p class="text-gray-600 text-sm">
                                {{ $product->manufacturer }} • {{ $product->country }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="p-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
                    <!-- <p class="text-gray-600 mb-6 leading-relaxed">{{ $product->description }}</p> -->

                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 font-medium">Manufacturer:</span>
                            <span class="text-gray-900">{{ $product->manufacturer }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 font-medium">Country of Origin:</span>
                            <span class="text-gray-900">{{ $product->country }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 font-medium">Packaging:</span>
                            <span class="text-gray-900">{{ $product->packaging }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200">
                            <span class="text-gray-600 font-medium">Package Size:</span>
                            <span class="text-gray-900">{{ $product->packing_size }}</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="https://wa.me/{{ $companyProfile->whatsapp }}?text=Hello, I'm interested in {{ $product->name }}. Please provide more information."
                            target="_blank"
                            class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300 font-semibold text-center transform hover:scale-105">
                            <i class="fab fa-whatsapp mr-2"></i>Ask via WhatsApp
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Related Products</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts as $relatedProduct)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300 transform hover:-translate-y-1 border border-gray-100">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="{{ $type === 'food' ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }} text-xs font-medium px-2 py-0.5 rounded-full">
                            {{ $type === 'food' ? 'Food' : 'API' }}
                        </span>
                        <span class="text-xs text-gray-500">{{ $relatedProduct->country }}</span>
                    </div>
                    <h3 class="text-lg font-semibold mb-2">{{ $relatedProduct->name }}</h3>
                    <!-- <p class="text-gray-600 text-sm mb-3">{{ Str::limit($relatedProduct->description, 80) }}</p> -->
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500">{{ $relatedProduct->manufacturer }}</span>
                        <a href="{{ route('catalog.show', ['type' => $type, 'id' => $relatedProduct->id]) }}"
                            class="{{ $type === 'food' ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }} text-white px-3 py-1 rounded text-sm transition duration-300">
                            View Details
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