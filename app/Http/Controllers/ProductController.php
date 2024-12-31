<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Shop;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getShopsProducts(Request $request, $shopId)
    {
        $shop = Shop::find($shopId);
        $products = $shop->products;

        if ($request->has('category') && $request->category != '') {
            $category = Category::find($request->category);
            if (!$category || $category->shop_id != $shopId) {
                abort(404, 'Category not found or does not belong to this shop.');
            }
            $products = $products->where('category_id', $request->category);
        }

        return view('products.index', compact('products', 'shop'));
    }
}
