@extends('layouts.app')

@section('content')
<div class="relative isolate overflow-hidden">
    {{-- Hero Section --}}
    <div class="relative bg-gradient-to-br from-red-50 to-white py-24 sm:py-32 lg:py-40 overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-y-0 left-0 w-1/2 bg-gradient-to-r from-red-500 to-transparent"></div>
            <svg class="absolute top-0 right-0 transform translate-x-1/2 -translate-y-1/4" width="404" height="784" fill="none" viewBox="0 0 404 784">
                <defs>
                    <pattern id="decorative-blob" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-red-200" fill="currentColor" />
                    </pattern>
                </defs>
                <rect width="404" height="784" fill="url(#decorative-blob)" />
            </svg>
        </div>
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center relative z-10">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-6xl mb-6 leading-tight">
                Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 to-red-800">Katalog Produk</span>
            </h1>
            <p class="mt-6 text-xl leading-8 text-gray-700 max-w-3xl mx-auto">
                Your trusted source for high-quality food products and Active Pharmaceutical Ingredients. Browse our extensive catalog for all your needs.
            </p>
            <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="{{ route('medicines.index') }}" class="relative group rounded-full bg-gradient-to-r from-red-600 to-red-700 px-8 py-4 text-lg font-semibold text-white shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 ease-in-out">
                    <span class="relative z-10">Browse Products</span>
                    <span class="absolute inset-0 bg-gradient-to-r from-red-700 to-red-800 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Section divider -->
    <div class="relative my-12">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-16 h-16 bg-white p-2 rounded-full shadow-md flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-red-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                </svg>
            </div>
        </div>
        <hr class="border-gray-200">
    </div>

    {{-- Featured Products Section --}}
    <div class="mx-auto max-w-7xl px-6 lg:px-8 py-24 sm:py-32">
        <div class="mx-auto max-w-2xl lg:max-w-none">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">Featured Products</h2>
                <p class="mt-6 text-xl leading-8 text-gray-700 max-w-3xl mx-auto">
                    Explore our selection of high-quality products for your needs.
                </p>
            </div>

            @if($medicines->isEmpty())
            <div class="text-center py-10 bg-white rounded-xl shadow-sm p-8 max-w-2xl mx-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 mx-auto text-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">No Products Available</h3>
                <p class="mt-2 text-gray-600">We're currently updating our product catalog. Please check back soon!</p>
            </div>
            @else
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($medicines->take(6) as $medicine)
                <div class="group relative flex flex-col bg-white p-8 rounded-2xl shadow-lg border border-gray-100 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 ease-in-out overflow-hidden">
                    <!-- Decorative corner accent -->
                    <div class="absolute top-0 right-0 w-16 h-16 bg-red-50 transform translate-x-8 -translate-y-8 rotate-45"></div>

                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 bg-red-100 p-3 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-600">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                            </svg>
                        </div>
                        <h3 class="ml-4 text-lg font-semibold text-gray-900">{{ $medicine->name }}</h3>
                    </div>

                    <div class="mt-2 mb-2">
                        <span class="text-3xl font-bold text-red-600">{{ $medicine->price_rupiah }}</span>
                    </div>

                    <p class="text-gray-600 mb-2">{{ $medicine->category }}</p>
                    <p class="text-gray-600 mb-6 flex-grow">{{ Str::limit($medicine->description, 100) }}</p>

                    <div class="flex items-center text-sm text-gray-500 mt-auto pt-4 border-t border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                        </svg>
                        <span>{{ $medicine->dosage }}</span>
                    </div>

                    <a href="{{ route('medicines.show', $medicine->id) }}" class="mt-4 block w-full text-center px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition-colors duration-300">
                        View Details
                    </a>

                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-400 to-red-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                @endforeach
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('medicines.index') }}" class="inline-flex items-center px-6 py-3 border border-red-600 text-red-600 rounded-md hover:bg-red-50 transition-colors duration-300">
                    View All Products
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            </div>
            @endif
        </div>
    </div>

    {{-- CTA Section --}}
    <div class="relative bg-gray-900 rounded-3xl overflow-hidden mx-6 lg:mx-8 mb-24">
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-20" src="https://images.unsplash.com/photo-1587854692152-cbe660dbde88?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2400&q=80" alt="Pharmacy">
        </div>
        <div class="relative max-w-7xl mx-auto py-24 px-6 sm:py-32 lg:px-8 text-center">
            <h2 class="text-4xl font-bold tracking-tight text-white sm:text-5xl">Your Health is Our Priority</h2>
            <p class="mt-6 text-xl leading-8 text-red-100 max-w-3xl mx-auto">
                Browse our extensive catalog of products for all your needs.
            </p>
            <div class="mt-12 flex flex-col sm:flex-row items-center justify-center gap-6">
                <a href="{{ route('medicines.index') }}" class="relative group rounded-full bg-gradient-to-r from-red-500 to-red-600 px-8 py-4 text-lg font-semibold text-white shadow-xl hover:shadow-2xl transform hover:scale-105 transition-all duration-300 ease-in-out">
                    <span class="relative z-10">Explore Our Catalog</span>
                    <span class="absolute inset-0 bg-gradient-to-r from-red-600 to-red-700 rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection