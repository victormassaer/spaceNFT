<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NftSearch extends Component
{
    public $search;
    public $nfts = [];

    public function mount()
    {
        $this->nfts = \App\Models\Nft::all();
    }

    public function search() {
        $this->nfts = \App\Models\Nft::where('title', 'LIKE', "%{$this->search}%")->get();
    }

    public function render()
    {
        return view('livewire.nft-search');
    }
}
