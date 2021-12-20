<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CollectionFilter extends Component
{

    public $filter;
    public $collections = [];

    public function mount()
    {
        $this->collections = \App\Models\Collection::all();
    }

    public function filter()
    {
        $this->collections = \App\Models\Collection::where('title', 'LIKE', "%{$this->filter}%")->get();
    }

    public function render()
    {
        return view('livewire.collection-filter');
    }
}
