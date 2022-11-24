<?php

namespace Database\Seeders;

use App\Models\type_user;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class type_userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        type_user::factory()->count(10)->create();
    }
}
