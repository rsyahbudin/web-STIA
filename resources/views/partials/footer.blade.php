<footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h3 class="text-2xl font-bold mb-2">{{ $companyProfile->company_name }}</h3>
            <p class="text-gray-400 mb-4">{{ $companyProfile->company_description }}</p>
            <p class="text-gray-500">&copy; {{ date('Y') }} {{ $companyProfile->company_name }}. All rights reserved.</p>
        </div>
    </div>
</footer>
