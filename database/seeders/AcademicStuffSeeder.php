<?php

namespace Database\Seeders;

use App\Models\AcademicStuff;
use Illuminate\Database\Seeder;

class AcademicStuffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcademicStuff::factory()
            ->count(5)
            ->create();
    }
}
