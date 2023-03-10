<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <!-- banner -->
    <div class="bg-cover bg-no-repeat bg-center py-36"
        style="background-image: url('{{ asset('/img') }}/bg-batik.jpg');">
        <div class="container">
            <h1 class="text-6xl text-gray-500 font-medium mb-4 capitalize">
                Dapatkan koleksi batik terbaik <br> Disini
            </h1>
            <p class="text-white drop-shadow-2xl">Kami menyediakan sistem pemesanan yang mudah dan cepat, sehingga Anda dapat dengan mudah membeli batik yang Anda sukai
            tanpa perlu keluar rumah.</p>
            <div class="mt-12">
                <button wire:click="shop" class="bg-[#6B4226] border border-[#6B4226] text-white px-8 py-3 font-medium 
                        rounded-md hover:bg-transparent hover:text-[#6B4226]">Lihat Toko</button>
            </div>
        </div>
    </div>
    <!-- ./banner -->
    
    <!-- features -->
    <div class="container py-16">
        <div class="w-10/12 grid grid-cols-3 gap-6 mx-auto justify-center">
            <div class="border border-[#6B4226] rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/images/icons/delivery-van.svg"
                    alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Free Shipping</h4>
                    <p class="text-gray-500 text-sm">Pengiriman gratis</p>
                </div>
            </div>
            <div class="border border-[#6B4226] rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/images/icons/money-back.svg"
                    alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">Refund</h4>
                    <p class="text-gray-500 text-sm">30 Hari garansi</p>
                </div>
            </div>
            <div class="border border-[#6B4226] rounded-sm px-3 py-6 flex justify-center items-center gap-5">
                <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/images/icons/service-hours.svg"
                    alt="Delivery" class="w-12 h-12 object-contain">
                <div>
                    <h4 class="font-medium capitalize text-lg">24/7 Support</h4>
                    <p class="text-gray-500 text-sm">Customer support</p>
                </div>
            </div>
        </div>
    </div>
    <!-- ./features -->
    
    <!-- categories -->
    <div class="container py-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Kategori yang tersedia</h2>
        <div class="grid grid-cols-3 gap-3">
            @foreach ($kategori as $k)
            <div class="relative rounded-sm overflow-hidden group">
                @if ($k->media)
                    <img src="{{ asset($k->media) }}" alt="category 1" class="w-full">
                @else
                    <img src="{{ asset('ecommerce-template-tailwind-1-main/public') }}/assets/images/category/category-1.jpg" alt="category 1" class="w-full">
                @endif
                <a href="{{ $k->id }}"
                    class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center text-xl text-white font-roboto font-medium group-hover:bg-opacity-60 transition">{{
                    $k->nama }}</a>
            </div>
            @endforeach
        </div>
    </div>
    <!-- ./categories -->
    
    <!-- new arrival -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">Produk Terbaru</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($terbaru as $t)
                @livewire('component.card', ['product' => $t], key($t->id))
            @endforeach
        </div>
    </div>
    <!-- ./new arrival -->
    
    <!-- ads -->
    <div class="container pb-16">
        <a href="#">
            <img src="{{ asset('/img') }}/test.gif" alt="ads"
                class="w-full">
        </a>
    </div>
    <!-- ./ads -->
    
    <!-- product -->
    <div class="container pb-16">
        <h2 class="text-2xl font-medium text-gray-800 uppercase mb-6">recomended for you</h2>
        <div class="grid grid-cols-4 gap-6">
            @foreach ($batik as $b)
                @livewire('component.card', ['product' => $b], key($b->id))
            @endforeach
        </div>
    </div>
    <!-- ./product -->
</div>
