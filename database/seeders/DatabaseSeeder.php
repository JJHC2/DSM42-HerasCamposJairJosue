<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\products;
use App\Models\details;
use App\Models\categories;
use App\Models\inventories;
use App\Models\model_categories;
use App\Models\type_user;
use App\Models\usuarios;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\addresses::factory(10)->create();
$this->call([
    productsSeeder::class,
    categoriesSeeder::class,
    model_categorySeeder::class,
    usuariosSeeder::class,
    type_userSeeder::class,
    inventorySeeder::class,
    detailsSeeder::class,
   
]);
    products::factory(10)->create(); 
    categories::factory(10)->create();
    model_categories::factory(10)->create(); 
    details::factory(10)->create(); 
    usuarios::factory(10)->create(); 
    type_user::factory(10)->create();
    inventories::factory(10)->create();  

    }
}

