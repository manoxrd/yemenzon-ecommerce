<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categories = [
      'Electronics',
      'Home Appliances',
      'Books',
      'Sports & Outdoors',
      'Toys & Games'
    ];

    Category::factory()->count(count($categories))->sequence(function ($sequence) use ($categories) {

      return ['name' => $categories[$sequence->index]];
    })->create();
  }
}