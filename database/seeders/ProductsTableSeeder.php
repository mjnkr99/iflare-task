<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::pluck('id');
        for ($i = 1; $i <= 7; $i++) {
            $products[] = [
                'category_id'          => $categories->random(),
                'product_name'          => fake()->sentence(2, true),
                'product_description'   => fake()->paragraph,
                'product_image'       => '',
                'product_status'        => true,
                // 'deleted_at'   => now(),
                'created_at'    => now(),
                'updated_at'    => now()
            ];
        }
        $chunks = array_chunk($products, 50);
        foreach ($chunks as $chunk) {
            Product::insert($chunk);
        }
    }
}
