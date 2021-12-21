<div class="m-6">
    <input class="w-full py-2 px-4 pr-8 rounded border-2 border-gray-900" wire:keyup="search" wire:model="search"
           type="text" name="search" id="search" placeholder="Search an NFT...">

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6 m-6" id="nft-section">
        @foreach($nfts as $nft)
            <div class="w-full shadow-xl rounded-lg">
                <a href="/nft/{{ $nft->id }}">
                    <img class="h-40 w-full object-center object-cover rounded-t-lg" src="{{ $nft->image }}"
                         alt="NFT {{ $nft->title }} image">
                </a>
                <div class="p-4">
                    <div class="mb-4">
                        <p class="font-bold">{{ $nft->title }}</p>

                    </div>
                    <div class="grid grid-cols-2">
                        <p class="font-bold">EUR {{ $nft->price }}</p>
                        <a class="text-right" href="user/{{ $nft->user_id }}">{{ \App\Models\User::all()->where('id', $nft->user_id)->first()->name }}</a>
                        <a class="text-left font-bold text-indigo-500 hover:text-blue-400 transition-colors duration-700 transform"
                           href="/nft/{{ $nft->id }}">Place a bid</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
