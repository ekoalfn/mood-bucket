<div>
    <div class="mb-6">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input
                    wire:model.live="search"
                    type="text"
                    placeholder="Cari produk..."
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300"
                >
            </div>
            <div class="w-full md:w-64">
                <select
                    wire:model.live="category"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-200 focus:border-pink-300"
                >
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $value => $label)
                        <option value="{{ $value }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                @if($product->images && count($product->images) > 0)
                    <a href="{{ route('produk', $product) }}">
                        <img
                            src="{{ Storage::url($product->images[0]) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-48 object-cover hover:opacity-90 transition-opacity"
                        >
                    </a>
                @endif
                <div class="p-4">
                    <a href="{{ route('produk', $product) }}" class="block">
                        <h3 class="text-lg font-semibold text-gray-800 hover:text-pink-600 transition-colors">{{ $product->name }}</h3>
                    </a>
                    <p class="text-sm text-gray-600 mb-2">{{ $product->category }}</p>
                    <p class="text-lg font-bold text-pink-600 mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a
                        href="https://wa.me/+6285702634706?text=Halo, saya ingin pesan {{ $product->name }}"
                        target="_blank"
                        class="block w-full text-center bg-pink-500 text-white py-2 rounded-lg hover:bg-pink-600 transition-colors"
                    >
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500">Tidak ada produk yang ditemukan.</p>
            </div>
        @endforelse
    </div>
</div>
