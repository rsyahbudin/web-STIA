<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Katalog Produk') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .nav-link {
            position: relative;
            padding-bottom: 8px;
        }
        .nav-link:after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #ef4444;
            transition: width 0.3s ease;
        }
        .nav-link:hover:after {
            width: 100%;
        }
        .active-nav:after {
            width: 100%;
        }
        
        /* Animasi untuk elemen latar belakang */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
            100% { transform: translateY(0px); }
        }
        
        .float-element {
            animation: float 6s ease-in-out infinite;
        }
    </style>
</head>

<body class="font-sans antialiased bg-red-50">
    <div class="min-h-screen flex flex-col">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20 items-center">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center text-2xl font-bold text-gray-800 hover:text-gray-900 transition duration-150">
                            <i class="fas fa-cut text-red-500 mr-2"></i>
                            <span class="bg-gradient-to-r from-red-600 to-red-400 bg-clip-text text-transparent">
                                {{ config('app.name', 'Katalog Produk') }}
                            </span>
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <div class="hidden sm:flex space-x-6">
                        <a href="{{ route('services.index') }}" 
                           class="nav-link text-gray-600 hover:text-gray-900 font-medium transition duration-150 {{ request()->routeIs('services.index') ? 'active-nav text-gray-900' : '' }}">
                            <i class="fas fa-concierge-bell mr-2"></i>Services
                        </a>
                        <a href="{{ route('bookings.create') }}" 
                           class="nav-link text-gray-600 hover:text-gray-900 font-medium transition duration-150 {{ request()->routeIs('bookings.create') ? 'active-nav text-gray-900' : '' }}">
                            <i class="fas fa-calendar-check mr-2"></i>Book Now
                        </a>
                        <a href="{{ route('bookings.check') }}" 
                           class="nav-link text-gray-600 hover:text-gray-900 font-medium transition duration-150 {{ request()->routeIs('bookings.check') ? 'active-nav text-gray-900' : '' }}">
                            <i class="fas fa-search mr-2"></i>Check Booking
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <div class="sm:hidden z-50">
                        <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:text-gray-900 focus:outline-none" aria-controls="mobile-menu" aria-expanded="false" id="mobile-menu-button">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation (hidden by default) -->
            <div class="sm:hidden hidden z-50" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white shadow-lg">
                    <a href="{{ route('services.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-red-50 {{ request()->routeIs('services.index') ? 'bg-red-50 text-gray-900' : '' }}">
                        <i class="fas fa-concierge-bell mr-2"></i>Services
                    </a>
                    <a href="{{ route('bookings.create') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-red-50 {{ request()->routeIs('bookings.create') ? 'bg-red-50 text-gray-900' : '' }}">
                        <i class="fas fa-calendar-check mr-2"></i>Book Now
                    </a>
                    <a href="{{ route('bookings.check') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-red-50 {{ request()->routeIs('bookings.check') ? 'bg-red-50 text-gray-900' : '' }}">
                        <i class="fas fa-search mr-2"></i>Check Booking
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="flex-grow">
            <!-- Alerts Section -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 text-green-500">
                            <i class="fas fa-check-circle text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-lg shadow-sm">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 text-red-500">
                            <i class="fas fa-exclamation-circle text-xl"></i>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">
                                There were {{ $errors->count() }} errors with your submission
                            </h3>
                            <div class="mt-2 text-sm text-red-700">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Page Content -->
                @yield('content')
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white border-t border-gray-200 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="flex items-center">
                        <i class="fas fa-cut text-red-500 mr-2 text-xl"></i>
                        <span class="text-lg font-semibold text-gray-800">{{ config('app.name', 'Katalog Produk') }}</span>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <p class="text-gray-500 text-sm">
                            &copy; {{ date('Y') }} {{ config('app.name', 'Katalog Produk') }}. All rights reserved.
                        </p>
                    </div>
                    <div class="mt-4 md:mt-0 flex space-x-4">
                        <a href="#" class="text-gray-500 hover:text-red-500 transition duration-150">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-red-400 transition duration-150">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-500 hover:text-red-500 transition duration-150">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');

        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });
        }
    </script>
</body>

</html>