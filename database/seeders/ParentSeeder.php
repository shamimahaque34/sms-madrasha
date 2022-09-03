<?php

namespace Database\Seeders;

use App\Models\Parent;
use Illuminate\Database\Seeder;

class ParentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        parent::factory()
            ->count(5)
            ->create();
    }
}
