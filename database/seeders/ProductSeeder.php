<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $admin = User::create([
        'name' => 'Admin',
        'email' => 'admin@yemenzon.com',
        'password' => bcrypt('mansour123321'),
        'role' => 'customer',
      ]);
      
      Product::factory(50)->create([
        'user_id' => $admin->id,
      ]);
      
    }
}
