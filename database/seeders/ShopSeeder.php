<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shop1 = Shop::find(61);
        $shop2 = Shop::find(62);


        $shop1->image = 'images/shop/shop1.avif';
        $shop2->image = 'images/shop/shop2.avif';

        $shop1->save();
        $shop2->save();
    }
}
