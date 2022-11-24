<?php

namespace Database\Seeders;

use App\Models\categories;
use Illuminate\Database\Seeder;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        categories::factory()->count(10)->create();
            }
}
