<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clothes = Category::create(['category_name' => 'Clothes']);
        Category::create(['category_name' => 'Women\' Clothes']);
        Category::create(['category_name' => 'Men\' Clothes']);
        Category::create(['category_name' => 'Boy\' Clothes']);
        Category::create(['category_name' => 'Girls\' Clothes']);
    }
}
