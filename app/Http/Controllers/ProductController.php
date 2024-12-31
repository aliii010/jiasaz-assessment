<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getShopsProducts($shopId)
    {
        $shop = Shop::find($shopId);
        dd($shop->products);
    }
}
