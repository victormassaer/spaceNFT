<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nfts()
    {
        return $this->hasMany(Nft::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
