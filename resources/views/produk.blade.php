<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Image Gallery -->
            <div class="space-y-4">
                @if($product->images && count($product->images) > 0)
                    <div class="aspect-w-4 aspect-h-3 rounded-lg overflow-hidden shadow-lg hover-scale">
                        <img
                            id="mainImage"
                            src="{{ Storage::url($product->images[0]) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover transition-transform duration-300"
                        >
                    </div>
                    @if(count($product->images) > 1)
                        <div class="grid grid-cols-4 gap-4">
                            @foreach($product->images as $index => $image)
                                <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden shadow-md hover-scale">
                                    <img
                                        src="{{ Storage::url($image) }}"
                                        alt="{{ $product->name }}"
                                        class="w-full h-full object-cover cursor-pointer hover:opacity-75 transition-all duration-200"
                                        data-image-src="{{ Storage::url($image) }}"
                                    >
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif
            </div>

            <!-- Product Information -->
            <div class="space-y-6">
                <div class="fade-in">
                    <h1 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h1>
                    <p class="mt-2 text-sm text-gray-500">{{ $product->category }}</p>
                </div>

                <div class="flex items-center fade-in" style="animation-delay: 0.1s">
                    <p class="text-3xl font-bold text-pink-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    @if($product->is_featured)
                        <span class="ml-4 px-3 py-1 text-sm font-medium text-pink-800 bg-pink-100 rounded-full">
                            Produk Unggulan
                        </span>
                    @endif
                </div>

                <div class="prose prose-sm text-gray-500 fade-in" style="animation-delay: 0.2s">
                    {!! nl2br(e($product->description)) !!}
                </div>

                <div class="pt-6 fade-in" style="animation-delay: 0.3s">
                    <a
                        href="https://wa.me/+628123456789?text=Halo, saya ingin pesan {{ $product->name }}"
                        target="_blank"
                        class="w-full md:w-auto flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-gradient-to-r from-pink-500 to-pink-600 hover:from-pink-600 hover:to-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                    >
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                        </svg>
                        Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const thumbnails = document.querySelectorAll('[data-image-src]');
            const mainImage = document.getElementById('mainImage');

            thumbnails.forEach(thumbnail => {
                thumbnail.addEventListener('click', function() {
                    const newSrc = this.getAttribute('data-image-src');
                    mainImage.style.opacity = '0';
                    setTimeout(() => {
                        mainImage.src = newSrc;
                        mainImage.style.opacity = '1';
                    }, 200);
                });
            });
        });
    </script>
    @endpush
</x-app-layout> 