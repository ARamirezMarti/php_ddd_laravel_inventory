<?php

namespace Database\Seeders;

use App\Models\Alerts;
use App\Models\Company;
use App\Models\Inventory;
use App\Models\ProdType;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Inventory::factory(50)->create();
        ProdType::factory(20)->create();
        Product::factory(150)->create();
        Alerts::factory(150)->create();
        Company::factory(100)->create();    
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
