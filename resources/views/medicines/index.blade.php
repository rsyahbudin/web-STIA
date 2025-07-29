@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-gradient-to-br from-red-50 via-white to-red-50/30 overflow-hidden">
    {{-- Floating Background Elements --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-64 h-64 bg-red-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob float-element"></div>
        <div class="absolute top-40 right-20 w-64 h-64 bg-white rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000 float-element"></div>
        <div class="absolute bottom-20 left-1/2 w-64 h-64 bg-red-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000 float-element"></div>
    </div>

    <div class="relative pt-16 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Page Header --}}
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-red-100 text-red-800 text-sm font-medium rounded-full mb-6 animate-bounce">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                    </svg>
                    Complete Product Catalog
                </div>
                <h1 class="text-5xl lg:text-6xl font-black text-gray-900 mb-6 leading-tight">
                    Our <span class="bg-gradient-to-r from-red-600 to-red-800 bg-clip-text text-transparent">Product</span> Collection
                </h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed font-light">
                    Browse our extensive catalog of products for all your needs.
                </p>
            </div>

            {{-- Search and Filter --}}
            <div class="bg-white rounded-xl shadow-md p-6 mb-8">
                <form action="{{ route('medicines.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="relative">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products..." 
                               class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <select name="category" class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-lg focus:ring-red-500 focus:border-red-500 appearance-none">
                            <option value="">All Categories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>{{ $category }}</option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                        </div>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2">
                        <button type="submit" class="flex-1 bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition-colors duration-300">
                            Apply Filters
                        </button>
                        <a href="{{ route('medicines.index') }}" class="flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium py-2 px-4 rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>
                        </a>
                    </div>
                </form>
            </div>

            {{-- Products Grid --}}
            @if($medicines->isEmpty())
            <div class="max-w-2xl mx-auto transform transition-all duration-500 hover:scale-105">
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100/50 p-16 text-center relative overflow-hidden">
                    <div class="absolute -top-20 -right-20 w-64 h-64 bg-red-100 rounded-full opacity-10"></div>
                    <div class="relative z-10">
                        <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">No Products Found</h3>
                        <p class="text-gray-600 text-lg mb-8">We couldn't find any products matching your criteria.</p>
                        <a href="{{ route('medicines.index') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 text-white font-semibold rounded-lg hover:from-red-700 hover:to-red-800 transition-all duration-300 hover:scale-105 shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            View All Products
                        </a>
                    </div>
                </div>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 lg:gap-10">
                @foreach($medicines as $medicine)
                <div class="group relative bg-white rounded-3xl shadow-lg border border-gray-100/50 hover:shadow-2xl hover:shadow-red-500/10 transition-all duration-500 ease-out hover:-translate-y-3 overflow-hidden">
                    {{-- Product Card Content --}}
                    <div class="p-6">
                        {{-- Category Badge --}}
                        <div class="mb-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $medicine->prescription_required ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ $medicine->prescription_required ? 'Requires Prescription' : 'Over the Counter' }}
                            </span>
                        </div>
                        
                        {{-- Medicine Name with Hover Effect --}}
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-red-600 transition-colors duration-300">
                            {{ $medicine->name }}
                        </h3>
                        
                        {{-- Description with Gradient Fade --}}
                        <div class="relative mb-8 h-20 overflow-hidden">
                            <p class="text-gray-600 text-base leading-relaxed line-clamp-3">
                                {{ $medicine->description }}
                            </p>
                            <div class="absolute bottom-0 left-0 right-0 h-8 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
                        </div>
                        
                        {{-- Medicine Details --}}
                        <div class="grid grid-cols-2 gap-4 mb-8">
                            {{-- Manufacturer --}}
                            <div class="flex flex-col">
                                <span class="text-xs text-gray-500 mb-1">Manufacturer</span>
                                <span class="text-sm font-medium text-gray-800">{{ $medicine->manufacturer }}</span>
                            </div>
                            
                            {{-- Dosage --}}
                            <div class="flex flex-col">
                                <span class="text-xs text-gray-500 mb-1">Dosage</span>
                                <span class="text-sm font-medium text-gray-800">{{ $medicine->dosage }}</span>
                            </div>
                        </div>
                        
                        {{-- Price and Stock --}}
                        <div class="flex items-center justify-between mb-6">
                            <div class="text-2xl font-bold text-red-600">{{ $medicine->price_rupiah }}</div>
                            <div class="flex items-center">
                                <span class="inline-block w-3 h-3 rounded-full {{ $medicine->stock > 10 ? 'bg-green-500' : ($medicine->stock > 0 ? 'bg-yellow-500' : 'bg-red-500') }} mr-2"></span>
                                <span class="text-sm font-medium {{ $medicine->stock > 10 ? 'text-green-700' : ($medicine->stock > 0 ? 'text-yellow-700' : 'text-red-700') }}">
                                    {{ $medicine->stock > 10 ? 'In Stock' : ($medicine->stock > 0 ? 'Low Stock' : 'Out of Stock') }}
                                </span>
                            </div>
                        </div>
                        
                        {{-- Action Button --}}
                        <a href="{{ route('medicines.show', $medicine->id) }}" class="block w-full text-center bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-medium py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-[1.02]">
                            View Details
                        </a>
                    </div>
                    
                    {{-- Bottom Accent Line --}}
                    <div class="absolute bottom-0 left-0 right-0 h-1 bg-gradient-to-r from-red-500 to-red-700"></div>
                </div>
                @endforeach
            </div>
            
            {{-- Pagination --}}
            <div class="mt-12">
                {{ $medicines->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
    
    .ripple::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%);
        transform-origin: 50% 50%;
    }
    
    .ripple:focus:not(:active)::after {
        animation: ripple 1s ease-out;
    }
    
    @keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 0.5;
        }
        100% {
            transform: scale(50, 50);
            opacity: 0;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add ripple effect to all buttons
    const buttons = document.querySelectorAll('.ripple');
    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            // Remove any existing ripple
            const existingRipple = this.querySelector('.ripple-effect');
            if (existingRipple) {
                existingRipple.remove();
            }
            
            // Create new ripple
            const ripple = document.createElement('span');
            ripple.classList.add('ripple-effect');
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.backgroundColor = 'rgba(255, 255, 255, 0.7)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 600ms linear';
            ripple.style.pointerEvents = 'none';
            
            // Position the ripple
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${e.clientX - rect.left - size/2}px`;
            ripple.style.top = `${e.clientY - rect.top - size/2}px`;
            
            this.appendChild(ripple);
            
            // Remove ripple after animation completes
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });
});
</script>