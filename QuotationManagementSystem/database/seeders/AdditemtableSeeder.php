<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class AdditemtableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $categories = ['Electronics', 'Furniture', 'Grocery', 'Clothing', 'Stationery'];
        $records = [];

        for ($i = 1; $i <= 700; $i++) {
            $costPrice = $faker->randomFloat(2, 50, 5000);
            $salePrice = $costPrice + $faker->randomFloat(2, 10, 500);
            $gst       = $faker->randomFloat(2, 1, 18);

            $records[] = [
                'name'       => $faker->word() . ' ' . $faker->word(),
                'category'   => $faker->randomElement($categories),
                'cost_price' => $costPrice,
                'sale_price' => $salePrice,
                'gst'        => $gst,
                'stock'      => $faker->numberBetween(1, 500),
                'barcode'    => strtoupper(Str::random(10)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('additemtable')->insert($records);
    }
}
