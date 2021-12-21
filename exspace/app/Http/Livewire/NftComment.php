<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class NftComment extends Component
{
    public $comment = "";

    public function render()
    {
        return view('livewire.nft-comment');
    }
    
    public function store()
    {
        $this->validate([
            'comment' => 'required|min:1'
        ]);
        Comment::create([
            'text' => $this->comment,
            'user_id' => Auth::id(),
            'nft_id' => 16
        ]);
        $this->resetInput();
    }
}
