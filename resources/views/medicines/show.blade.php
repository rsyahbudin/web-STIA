@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-br from-red-50 via-white to-red-50/30 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb Navigation -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-red-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <a href="{{ route('medicines.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-red-600 md:ml-2">Products</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $medicine->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Product Information -->
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-0">
                <!-- Product Image -->
                <div class="bg-gradient-to-br from-red-50 to-white p-8 flex items-center justify-center">
                    <div class="w-full max-w-md aspect-square bg-white rounded-xl shadow-lg p-6 flex items-center justify-center">
                        @if($medicine->image_url)
                        <img src="{{ $medicine->image_url }}" alt="{{ $medicine->name }}" class="max-h-full object-contain">
                        @else
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-24 h-24 mx-auto text-red-200">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 3.104v5.714a2.25 2.25 0 01-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 014.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0112 15a9.065 9.065 0 00-6.23-.693L5 14.5m14.8.8l1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0112 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5" />
                            </svg>
                            <p class="mt-4 text-gray-500">Product image not available</p>
                        </div>
                        @endif
                    </div>
                </div>
                
                <!-- Product Details -->
                <div class="p-8 lg:p-12">
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-2">
                            <h1 class="text-3xl font-bold text-gray-900">{{ $medicine->name }}</h1>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $medicine->prescription_required ? 'bg-red-100 text-red-800' : 'bg-green-100 text-green-800' }}">
                                {{ $medicine->prescription_required ? 'Requires Prescription' : 'Over the Counter' }}
                            </span>
                        </div>
                        <div class="text-3xl font-bold text-red-600 mb-4">{{ $medicine->price_rupiah }}</div>
                        <p class="text-gray-600 mb-8">{{ $medicine->description }}</p>
                        
                        <div class="bg-gray-50 rounded-xl p-6 mb-8">
                            <h2 class="text-lg font-semibold text-gray-900 mb-4">Details</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <h3 class="text-sm text-gray-500">Manufacturer</h3>
                                    <p class="text-gray-900">{{ $medicine->manufacturer }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm text-gray-500">Dosage</h3>
                                    <p class="text-gray-900">{{ $medicine->dosage }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm text-gray-500">Category</h3>
                                    <p class="text-gray-900">{{ $medicine->category }}</p>
                                </div>
                                <div>
                                    <h3 class="text-sm text-gray-500">Stock Status</h3>
                                    <div class="flex items-center">
                                        <span class="inline-block w-3 h-3 rounded-full {{ $medicine->stock > 10 ? 'bg-green-500' : ($medicine->stock > 0 ? 'bg-yellow-500' : 'bg-red-500') }} mr-2"></span>
                                        <span class="text-sm font-medium {{ $medicine->stock > 10 ? 'text-green-700' : ($medicine->stock > 0 ? 'text-yellow-700' : 'text-red-700') }}">
                                            {{ $medicine->stock > 10 ? 'In Stock' : ($medicine->stock > 0 ? 'Low Stock' : 'Out of Stock') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if($medicine->prescription_required)
                        <div class="bg-amber-50 border-l-4 border-amber-500 p-4 rounded">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-amber-500 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                                <p class="text-amber-700">This product requires a valid prescription from a licensed healthcare provider.</p>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#" class="inline-flex items-center justify-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                            </svg>
                            Add to Cart
                        </a>
                        <a href="{{ route('medicines.index') }}" class="inline-flex items-center justify-center px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-lg transition-colors duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                            </svg>
                            Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products Section -->
        <div class="mt-16">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Products</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($relatedMedicines as $relatedMedicine)
                <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $relatedMedicine->name }}</h3>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $relatedMedicine->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-red-600 font-bold">{{ $relatedMedicine->price_rupiah }}</span>
                            <a href="{{ route('medicines.show', $relatedMedicine->id) }}" class="text-red-600 hover:text-red-800 font-medium text-sm">View Details →</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection