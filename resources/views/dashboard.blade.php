<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Centered Container -->
<div class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <a href="/createquotation" 
       class="btn btn-gradient btn-lg shadow-lg">
        <i class="fas fa-file-invoice me-2"></i> Create User Quotation
    </a>
</div>

<!-- Add this CSS (can go inside a <style> tag or app.css) -->
<style>
.btn-gradient {
    background: linear-gradient(135deg, #3b82f6, #06b6d4, #10b981);
    color: #fff !important;
    font-size: 1.25rem;
    font-weight: 600;
    padding: 14px 40px;
    border: none;
    border-radius: 50px;
    transition: all 0.3s ease;
    text-decoration: none;
}
.btn-gradient:hover {
    background: linear-gradient(135deg, #2563eb, #0891b2, #059669);
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}
</style>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
