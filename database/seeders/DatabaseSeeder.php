<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {    

        Product::factory(20)->create();

        $this->call(UserSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
