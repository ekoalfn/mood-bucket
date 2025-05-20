<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="text-center">
            <h1 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Katalog Produk
            </h1>
            <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                Temukan bucket bunga yang sesuai dengan kebutuhan Anda
            </p>
        </div>

        <div class="mt-12">
            @livewire('product-filter')
        </div>
    </div>
</x-app-layout> 