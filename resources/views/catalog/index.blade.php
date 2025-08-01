@extends('layouts.app')

@section('content')
<!-- Header Section -->
<section class="bg-gradient-to-br from-red-600 via-red-700 to-red-800 text-white py-12 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-10 right-20 w-32 h-32 bg-white/5 rounded-full blur-xl"></div>
        <div class="absolute bottom-10 left-20 w-24 h-24 bg-white/5 rounded-full blur-lg"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold mb-4">Product Catalog</h1>
            <p class="text-lg sm:text-xl text-gray-100 max-w-2xl mx-auto">
                High-quality products for your business needs
            </p>
        </div>

        <!-- Enhanced Search Form -->
        <div class="max-w-lg mx-auto">
            <form method="GET" action="{{ route('catalog.index') }}" class="relative">
                <input type="hidden" name="tab" value="{{ $activeTab }}">
                <div class="relative flex items-center">
                    <input type="text" name="search" value="{{ $search }}"
                        placeholder="Search products"
                        class="w-full pl-12 pr-4 py-4 rounded-2xl text-gray-900 bg-white/95 backdrop-blur-sm border border-white/20 focus:outline-none focus:ring-2 focus:ring-white/50 focus:bg-white transition-all duration-300 placeholder-gray-500">
                    <i class="fas fa-search absolute left-4 text-gray-400"></i>
                    <button type="submit"
                        class="absolute right-2 bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-red-300">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Tab Navigation -->
<section class="bg-white shadow-sm sticky top-0 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-center items-center">
            <div class="flex space-x-1 bg-gray-100 p-1 rounded-xl">
                <button onclick="switchTab('food')"
                    class="tab-button flex items-center px-6 py-3 rounded-lg font-medium text-sm transition-all duration-300 whitespace-nowrap {{ $activeTab === 'food' ? 'bg-red-600 text-white shadow-md' : 'text-gray-600 hover:text-gray-800 hover:bg-gray-200' }}">
                    <i class="fas fa-utensils mr-2"></i>
                    <span class="hidden sm:inline">Food Products</span>
                    <span class="sm:hidden">Food</span>
                    <span class="ml-2 bg-white/20 text-current py-1 px-2 rounded-full text-xs font-semibold">{{ $totalFoodProducts }}</span>
                </button>
                <button onclick="switchTab('api')"
                    class="tab-button flex items-center px-6 py-3 rounded-lg font-medium text-sm transition-all duration-300 whitespace-nowrap {{ $activeTab === 'api' ? 'bg-green-600 text-white shadow-md' : 'text-gray-600 hover:text-gray-800 hover:bg-gray-200' }}">
                    <i class="fas fa-flask mr-2"></i>
                    <span class="hidden sm:inline">Pharmaceutical APIs</span>
                    <span class="sm:hidden">APIs</span>
                    <span class="ml-2 bg-white/20 text-current py-1 px-2 rounded-full text-xs font-semibold">{{ $totalApiProducts }}</span>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Search Results Info -->
@if($search)
<section class="bg-gray-50 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center">
                <i class="fas fa-search text-gray-400 mr-2"></i>
                <p class="text-gray-600">
                    <span class="font-medium">{{ $activeTab === 'food' ? $foodProducts->total() : $apiProducts->total() }}</span>
                    results for "<span class="font-semibold text-gray-900">{{ $search }}</span>"
                </p>
            </div>
            <a href="{{ route('catalog.index', ['tab' => $activeTab]) }}"
                class="inline-flex items-center text-red-600 hover:text-red-700 text-sm font-medium mt-2 sm:mt-0 transition-colors">
                <i class="fas fa-times mr-1"></i> Clear search
            </a>
        </div>
    </div>
</section>
@endif

<!-- Products Grid -->
<section class="py-8 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Food Products Tab -->
        <div id="food-tab" class="tab-content {{ $activeTab === 'food' ? 'block' : 'hidden' }}">
            @if($foodProducts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($foodProducts as $product)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="p-5">
                        <!-- Header with badge and country -->
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-red-100 text-red-700 text-xs font-semibold px-2 py-1 rounded-full">Food</span>
                            <span class="text-xs text-gray-500 font-medium truncate ml-2">{{ $product->country }}</span>
                        </div>

                        <!-- Product name -->
                        <h3 class="text-base font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">{{ $product->name }}</h3>


                        <!-- Product details -->
                        <div class="space-y-1.5 mb-4">
                            <div class="flex justify-between items-start text-xs">
                                <span class="text-gray-500 font-medium flex-shrink-0">Manufacturer:</span>
                                <span class="text-gray-900 font-semibold text-right ml-2 line-clamp-1">{{ $product->manufacturer }}</span>
                            </div>
                            <div class="flex justify-between items-start text-xs">
                                <span class="text-gray-500 font-medium flex-shrink-0">Packaging:</span>
                                <span class="text-gray-900 font-semibold text-right ml-2 line-clamp-1">{{ $product->packaging }}</span>
                            </div>
                            <div class="flex justify-between items-start text-xs">
                                <span class="text-gray-500 font-medium flex-shrink-0">Size:</span>
                                <span class="text-gray-900 font-semibold text-right ml-2 line-clamp-1">{{ $product->packing_size }}</span>
                            </div>
                        </div>

                        <!-- Action buttons -->
                        <div class="flex gap-2">
                            <a href="{{ route('catalog.show', ['type' => 'food', 'id' => $product->id]) }}"
                                class="flex-1 bg-red-600 text-white px-3 py-2 rounded-lg hover:bg-red-700 transition-all duration-300 text-xs font-semibold text-center">
                                Details
                            </a>
                            <a href="https://wa.me/{{ $companyProfile->whatsapp }}?text=Hello, I'm interested in {{ $product->name }}. Please provide more information."
                                target="_blank"
                                class="bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700 transition-all duration-300 text-xs font-semibold text-center">
                                <i class="fab fa-whatsapp mr-1"></i>Ask
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination for Food Products -->
            <div class="mt-8">
                {{ $foodProducts->appends(['tab' => 'food', 'search' => $search])->links() }}
            </div>
            @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No food products found</h3>
                <p class="text-gray-500 mb-6">Try using different keywords or view all our products</p>
                <a href="{{ route('catalog.index', ['tab' => 'food']) }}" class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition duration-300">
                    View All Food Products
                </a>
            </div>
            @endif
        </div>

        <!-- API Products Tab -->
        <div id="api-tab" class="tab-content {{ $activeTab === 'api' ? 'block' : 'hidden' }}">
            @if($apiProducts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($apiProducts as $product)
                <div class="bg-white rounded-xl shadow-sm border border-gray-200 hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="p-5">
                        <!-- Header with badge and country -->
                        <div class="flex items-center justify-between mb-3">
                            <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">API</span>
                            <span class="text-xs text-gray-500 font-medium truncate ml-2">{{ $product->country }}</span>
                        </div>

                        <!-- Product name -->
                        <h3 class="text-base font-bold text-gray-900 mb-2 line-clamp-2 leading-tight">{{ $product->name }}</h3>


                        <!-- Product details -->
                        <div class="space-y-1.5 mb-4">
                            <div class="flex justify-between items-start text-xs">
                                <span class="text-gray-500 font-medium flex-shrink-0">Manufacturer:</span>
                                <span class="text-gray-900 font-semibold text-right ml-2 line-clamp-1">{{ $product->manufacturer }}</span>
                            </div>
                            <div class="flex justify-between items-start text-xs">
                                <span class="text-gray-500 font-medium flex-shrink-0">Packaging:</span>
                                <span class="text-gray-900 font-semibold text-right ml-2 line-clamp-1">{{ $product->packaging }}</span>
                            </div>
                            <div class="flex justify-between items-start text-xs">
                                <span class="text-gray-500 font-medium flex-shrink-0">Size:</span>
                                <span class="text-gray-900 font-semibold text-right ml-2 line-clamp-1">{{ $product->packing_size }}</span>
                            </div>
                        </div>

                        <!-- Action buttons -->
                        <div class="flex gap-2">
                            <a href="{{ route('catalog.show', ['type' => 'api', 'id' => $product->id]) }}"
                                class="flex-1 bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700 transition-all duration-300 text-xs font-semibold text-center">
                                Details
                            </a>
                            <a href="https://wa.me/{{ $companyProfile->whatsapp }}?text=Hello, I'm interested in {{ $product->name }}. Please provide more information."
                                target="_blank"
                                class="bg-green-600 text-white px-3 py-2 rounded-lg hover:bg-green-700 transition-all duration-300 text-xs font-semibold text-center">
                                <i class="fab fa-whatsapp mr-1"></i>Ask
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination for API Products -->
            <div class="mt-8">
                {{ $apiProducts->appends(['tab' => 'api', 'search' => $search])->links() }}
            </div>
            @else
            <div class="text-center py-16">
                <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-search text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">No APIs found</h3>
                <p class="text-gray-500 mb-6">Try using different keywords or view all our APIs</p>
                <a href="{{ route('catalog.index', ['tab' => 'api']) }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                    View All APIs
                </a>
            </div>
            @endif
        </div>
    </div>
</section>

<script>
    function switchTab(tab) {
        // Update URL without page reload
        const url = new URL(window.location);
        url.searchParams.set('tab', tab);
        url.searchParams.delete('search');
        url.searchParams.delete('page'); // Reset to first page when switching tabs
        window.history.pushState({}, '', url);

        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(content => {
            content.classList.add('hidden');
        });

        // Show selected tab content
        document.getElementById(tab + '-tab').classList.remove('hidden');

        // Update tab button styles
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('bg-red-600', 'text-white', 'shadow-md', 'bg-green-600');
            button.classList.add('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
        });

        // Style active tab button
        const activeButton = event.target.closest('.tab-button');
        if (tab === 'food') {
            activeButton.classList.remove('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
            activeButton.classList.add('bg-red-600', 'text-white', 'shadow-md');
        } else {
            activeButton.classList.remove('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
            activeButton.classList.add('bg-green-600', 'text-white', 'shadow-md');
        }
    }

    // Initialize tab based on URL parameter
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const tab = urlParams.get('tab') || 'food';

        // Update tab buttons
        document.querySelectorAll('.tab-button').forEach(button => {
            button.classList.remove('bg-red-600', 'text-white', 'shadow-md', 'bg-green-600');
            button.classList.add('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
        });

        // Style active tab
        if (tab === 'food') {
            const foodButton = document.querySelector('.tab-button[onclick="switchTab(\'food\')"]');
            foodButton.classList.remove('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
            foodButton.classList.add('bg-red-600', 'text-white', 'shadow-md');
        } else {
            const apiButton = document.querySelector('.tab-button[onclick="switchTab(\'api\')"]');
            apiButton.classList.remove('text-gray-600', 'hover:text-gray-800', 'hover:bg-gray-200');
            apiButton.classList.add('bg-green-600', 'text-white', 'shadow-md');
        }
    });

    // Smooth scroll to top when switching tabs
    function smoothScrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Add loading state for search
    document.querySelector('form').addEventListener('submit', function() {
        const button = this.querySelector('button[type="submit"]');
        button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Searching...';
        button.disabled = true;
    });

    // Handle pagination clicks to preserve tab and search state
    document.addEventListener('click', function(e) {
        if (e.target.closest('.pagination .page-link')) {
            e.preventDefault();
            const link = e.target.closest('.page-link');
            const href = link.getAttribute('href');

            if (href) {
                // Preserve current tab and search parameters
                const url = new URL(href, window.location.origin);
                const currentTab = new URLSearchParams(window.location.search).get('tab') || 'food';
                const currentSearch = new URLSearchParams(window.location.search).get('search') || '';

                url.searchParams.set('tab', currentTab);
                if (currentSearch) {
                    url.searchParams.set('search', currentSearch);
                }

                window.location.href = url.toString();
            }
        }
    });
</script>

<style>
    .line-clamp-1 {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* Smooth transitions */
    * {
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    /* Enhanced hover effects */
    .group:hover .group-hover\:scale-110 {
        transform: scale(1.1);
    }

    .group:hover .group-hover\:shadow-md {
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    /* Responsive grid improvements */
    @media (max-width: 640px) {
        .grid {
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1rem;
        }
    }

    @media (min-width: 641px) and (max-width: 1024px) {
        .grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 1.5rem;
        }
    }

    /* Sticky navigation */
    .sticky {
        position: sticky;
        top: 0;
        z-index: 40;
    }

    /* Enhanced search input */
    input[type="text"]:focus {
        box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.5);
    }

    /* Loading animation */
    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .fa-spin {
        animation: spin 1s linear infinite;
    }

    /* Card hover effects */
    .hover-lift {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .hover-lift:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }

    /* Text truncation utilities */
    .truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /* Custom Pagination Styling */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 2rem;
    }

    .pagination .page-item {
        list-style: none;
    }

    .pagination .page-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 0.5rem;
        background-color: white;
        border: 1px solid #e5e7eb;
        color: #6b7280;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease-in-out;
    }

    .pagination .page-link:hover {
        background-color: #f3f4f6;
        border-color: #d1d5db;
        color: #374151;
    }

    .pagination .page-item.active .page-link {
        background-color: #dc2626;
        border-color: #dc2626;
        color: white;
    }

    .pagination .page-item.disabled .page-link {
        background-color: #f9fafb;
        border-color: #e5e7eb;
        color: #9ca3af;
        cursor: not-allowed;
    }

    .pagination .page-item:first-child .page-link,
    .pagination .page-item:last-child .page-link {
        width: auto;
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }

    /* Responsive pagination */
    @media (max-width: 640px) {
        .pagination {
            gap: 0.25rem;
        }

        .pagination .page-link {
            width: 2rem;
            height: 2rem;
            font-size: 0.875rem;
        }

        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
            font-size: 0.75rem;
        }
    }
</style>
@endsection