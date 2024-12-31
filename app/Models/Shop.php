<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    public function shopOwner()
    {
        return $this->belongsTo(User::class, 'shop_owner_id');
    }
}
