<?php

namespace Database\Seeders;

use App\Models\model_categories;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class model_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        model_categories::factory()->count(10)->create();
    }
}
