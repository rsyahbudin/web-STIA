<!-- resources/views/home.blade.php -->
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="home" class="pt-16 bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white relative overflow-hidden min-h-[80vh] flex items-center">
    @if($companyProfile->hero_image)
    <div class="absolute inset-0 h-full w-full">
        <img src="{{ asset('storage/' . $companyProfile->hero_image) }}"
            alt="Hero Background"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-br from-red-900/70 to-black/50"></div>
    </div>
    @else
    <div class="absolute inset-0 bg-gradient-to-br from-red-900/30 to-black/20"></div>
    @endif

    <!-- Animated background particles -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 left-10 w-2 h-2 bg-white/20 rounded-full animate-pulse"></div>
        <div class="absolute top-1/4 right-20 w-1 h-1 bg-white/30 rounded-full animate-pulse delay-300"></div>
        <div class="absolute bottom-1/3 left-1/4 w-1.5 h-1.5 bg-white/20 rounded-full animate-pulse delay-700"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center max-w-4xl mx-auto">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6 leading-tight animate-fade-in">
                {{ $companyProfile->hero_title }}
            </h1>
            <p class="text-lg sm:text-xl lg:text-2xl mb-8 text-gray-100 leading-relaxed animate-fade-in-delay max-w-3xl mx-auto">
                {{ $companyProfile->hero_subtitle }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-delay-2">
                <a href="{{ route('catalog.index') }}"
                    class="bg-white text-red-600 px-8 py-4 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-box-open mr-2"></i>View Product Catalog
                </a>

            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-16 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">About {{ $companyProfile->company_name }}</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-red-600 to-red-400 mx-auto mb-6"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                {{ $companyProfile->company_description }}
            </p>
        </div>

        @if($companyProfile->vision || $companyProfile->mission)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-12">
            @if($companyProfile->vision)
            <div class="group bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center mr-4 group-hover:bg-red-200 transition-colors">
                        <i class="fas fa-eye text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Vision</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">{{ $companyProfile->vision }}</p>
            </div>
            @endif

            @if($companyProfile->mission)
            <div class="group bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mr-4 group-hover:bg-blue-200 transition-colors">
                        <i class="fas fa-bullseye text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900">Mission</h3>
                </div>
                <p class="text-gray-700 leading-relaxed">{{ $companyProfile->mission }}</p>
            </div>
            @endif
        </div>
        @endif

        <!-- Value Propositions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="group text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-award text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Quality Assured</h3>
                <p class="text-gray-600 leading-relaxed">All our products are certified and meet international standards</p>
            </div>

            <div class="group text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-shipping-fast text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Fast Delivery</h3>
                <p class="text-gray-600 leading-relaxed">Extensive distribution network ensures timely delivery</p>
            </div>

            <div class="group text-center p-6 bg-white rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300">
                    <i class="fas fa-handshake text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3 text-gray-900">Trusted Service</h3>
                <p class="text-gray-600 leading-relaxed">Professional team ready to provide the best service for your needs</p>
            </div>
        </div>
    </div>
</section>

<!-- Our Customers Section -->
@if($featuredCustomers->count() > 0)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Our Trusted Partners</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-red-600 to-red-400 mx-auto mb-6"></div>
            <p class="text-lg text-gray-600">We are proud to serve leading companies across various industries</p>
        </div>

        <!-- Customer Logo Carousel -->
        <div class="relative overflow-hidden bg-gradient-to-r from-gray-50 via-white to-gray-50 rounded-2xl py-8">
            <div class="customer-carousel flex space-x-8 animate-scroll">
                @foreach($featuredCustomers as $customer)
                <div class="customer-logo flex-shrink-0">
                    @if($customer->logo_url)
                    <div class="h-24 w-48 bg-white rounded-xl shadow-sm border border-gray-100 p-4 flex items-center justify-center hover:shadow-md transition-all duration-300 transform hover:scale-105">
                        <img src="{{ asset('storage/' . $customer->logo_url) }}"
                            alt="{{ $customer->name }}"
                            class="max-h-16 max-w-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                    @else
                    <div class="h-24 w-48 bg-white rounded-xl shadow-sm border border-gray-100 p-4 flex items-center justify-center hover:shadow-md transition-all duration-300 transform hover:scale-105">
                        <div class="text-center">
                            <i class="fas fa-building text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-600 font-medium leading-tight">{{ $customer->name }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach

                <!-- Duplicate for seamless loop -->
                @foreach($featuredCustomers as $customer)
                <div class="customer-logo flex-shrink-0">
                    @if($customer->logo_url)
                    <div class="h-24 w-48 bg-white rounded-xl shadow-sm border border-gray-100 p-4 flex items-center justify-center hover:shadow-md transition-all duration-300 transform hover:scale-105">
                        <img src="{{ asset('storage/' . $customer->logo_url) }}"
                            alt="{{ $customer->name }}"
                            class="max-h-16 max-w-full object-contain filter grayscale hover:grayscale-0 transition-all duration-300">
                    </div>
                    @else
                    <div class="h-24 w-48 bg-white rounded-xl shadow-sm border border-gray-100 p-4 flex items-center justify-center hover:shadow-md transition-all duration-300 transform hover:scale-105">
                        <div class="text-center">
                            <i class="fas fa-building text-3xl text-gray-400 mb-2"></i>
                            <p class="text-sm text-gray-600 font-medium leading-tight">{{ $customer->name }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<!-- Featured Products Section -->
<section class="py-16 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">Featured Products</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-red-600 to-red-400 mx-auto mb-6"></div>
            <p class="text-lg text-gray-600">High-quality products for your business needs</p>
        </div>

        <!-- Tab Navigation -->
        <div class="flex justify-center items-center mb-8">
            <div class="flex space-x-1 bg-gray-100 p-1 rounded-xl">
                <button onclick="switchHomeTab('food')"
                    class="home-tab-button flex items-center px-6 py-3 rounded-lg font-medium text-sm transition-all duration-300 whitespace-nowrap bg-red-600 text-white shadow-md">
                    <i class="fas fa-utensils mr-2"></i>
                    <span class="hidden sm:inline">Food Products</span>
                    <span class="sm:hidden">Food</span>
                    <span class="ml-2 bg-white/20 text-current py-1 px-2 rounded-full text-xs font-semibold">{{ $featuredFoodProducts->count() }}</span>
                </button>
                <button onclick="switchHomeTab('api')"
                    class="home-tab-button flex items-center px-6 py-3 rounded-lg font-medium text-sm transition-all duration-300 whitespace-nowrap text-gray-600 hover:text-gray-800 hover:bg-gray-200">
                    <i class="fas fa-flask mr-2"></i>
                    <span class="hidden sm:inline">Pharmaceutical APIs</span>
                    <span class="sm:hidden">APIs</span>
                    <span class="ml-2 bg-white/20 text-current py-1 px-2 rounded-full text-xs font-semibold">{{ $featuredApis->count() }}</span>
                </button>
            </div>
        </div>

        <!-- Food Products Tab -->
        <div id="home-food-tab" class="home-tab-content">
            @if($featuredFoodProducts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach($featuredFoodProducts as $product)
                <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-2">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Food Product</span>
                            <span class="text-xs text-gray-500">{{ $product->country }}</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900 group-hover:text-red-600 transition-colors">{{ $product->name }}</h3>

                        <div class="flex items-center justify-between mb-4 text-sm">
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-industry mr-1"></i>
                                <span>{{ $product->manufacturer }}</span>
                            </div>
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-globe mr-1"></i>
                                <span>{{ $product->country }}</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-box mr-1"></i>
                                {{ $product->packaging }} - {{ $product->packing_size }}
                            </div>
                            <a href="{{ route('catalog.index') }}?tab=food&product={{ $product->id }}"
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 transform hover:scale-105 text-sm font-medium">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-box-open text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No Food Products Available</h3>
                <p class="text-gray-500">We are currently updating our product catalog</p>
            </div>
            @endif

            <div class="text-center">
                <a href="{{ route('catalog.index') }}?tab=food"
                    class="inline-flex items-center bg-red-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-red-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-arrow-right mr-2"></i>View All Food Products
                </a>
            </div>
        </div>

        <!-- API Products Tab -->
        <div id="home-api-tab" class="home-tab-content hidden">
            @if($featuredApis->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                @foreach($featuredApis as $api)
                <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-2">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">API Product</span>
                            <span class="text-xs text-gray-500">{{ $api->country }}</span>
                        </div>
                        <h3 class="text-xl font-semibold mb-3 text-gray-900 group-hover:text-green-600 transition-colors">{{ $api->name }}</h3>

                        <div class="flex items-center justify-between mb-4 text-sm">
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-industry mr-1"></i>
                                <span>{{ $api->manufacturer }}</span>
                            </div>
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-globe mr-1"></i>
                                <span>{{ $api->country }}</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <i class="fas fa-box mr-1"></i>
                                {{ $api->packaging }} - {{ $api->packing_size }}
                            </div>
                            <a href="{{ route('catalog.index') }}?tab=api&product={{ $api->id }}"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition-all duration-300 transform hover:scale-105 text-sm font-medium">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                <div class="w-20 h-20 bg-gray-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-flask text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No APIs Available</h3>
                <p class="text-gray-500">We are currently updating our API catalog</p>
            </div>
            @endif

            <div class="text-center">
                <a href="{{ route('catalog.index') }}?tab=api"
                    class="inline-flex items-center bg-green-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-green-700 transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                    <i class="fas fa-arrow-right mr-2"></i>View All APIs
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }

    .animate-fade-in-delay {
        animation: fade-in 1s ease-out 0.3s both;
    }

    .animate-fade-in-delay-2 {
        animation: fade-in 1s ease-out 0.6s both;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Enhanced Customer Carousel Animation */
    @keyframes scroll {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .animate-scroll {
        animation: scroll 40s linear infinite;
    }

    .customer-carousel:hover .animate-scroll {
        animation-play-state: paused;
    }

    .customer-logo {
        transition: all 0.3s ease;
    }

    /* Customer logo container improvements */
    .customer-logo .bg-white {
        min-height: 96px;
        /* h-24 */
        min-width: 192px;
        /* w-48 */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Logo image improvements */
    .customer-logo img {
        max-height: 64px;
        /* max-h-16 */
        max-width: 100%;
        object-fit: contain;
        object-position: center;
    }

    /* Fallback icon improvements */
    .customer-logo .text-center {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
    }

    /* Responsive customer carousel */
    @media (max-width: 768px) {
        .customer-logo .bg-white {
            min-height: 80px;
            min-width: 160px;
        }

        .customer-logo img {
            max-height: 48px;
        }

        .customer-logo .text-center {
            padding: 0.5rem;
        }

        .customer-logo .text-center i {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .customer-logo .text-center p {
            font-size: 0.75rem;
            line-height: 1.2;
        }
    }

    /* Smooth scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Custom gradient backgrounds */
    .bg-gradient-modern {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    /* Enhanced hover effects */
    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Modern card styling */
    .modern-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    /* Responsive improvements */
    @media (max-width: 768px) {
        .text-4xl {
            font-size: 2.5rem;
        }

        .text-6xl {
            font-size: 3.5rem;
        }
    }

    /* Home Tab Styling */
    .home-tab-content {
        transition: all 0.3s ease-in-out;
    }

    .home-tab-button {
        transition: all 0.3s ease-in-out;
    }
</style>

<script>
    function switchHomeTab(tab) {
        // Hide all tab contents
        document.querySelectorAll('.home-tab-content').forEach(content => {
            content.classList.add('hidden');
        });

        // Show selected tab content
        document.getElementById('home-' + tab + '-tab').classList.remove('hidden');

        // Update tab button styles
        document.querySelectorAll('.home-tab-button').forEach(button => {
            button.classList.remove('bg-red-600', 'text-white', 'shadow-md', 'bg-green-600');
            button.classList.add('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
        });

        // Style active tab button
        const activeButton = event.target.closest('.home-tab-button');
        if (tab === 'food') {
            activeButton.classList.remove('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
            activeButton.classList.add('bg-red-600', 'text-white', 'shadow-md');
        } else {
            activeButton.classList.remove('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
            activeButton.classList.add('bg-green-600', 'text-white', 'shadow-md');
        }
    }
</script>
@endsection