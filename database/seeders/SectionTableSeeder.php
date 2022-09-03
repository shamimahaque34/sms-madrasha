<?php

namespace Database\Seeders;
use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section =[
            [

               
                'id' =>1,
                'section_name' =>'a',
                'section_capacity' =>'10',
                'section_note' =>'',
                'slug' =>str_replace(' ','-','a'),
                'section_status' =>1,
            ],

            [
                'id' =>2,
                'section_name' =>'b',
                'section_capacity' =>'15',
                'section_note' =>'',
                'slug' =>str_replace(' ','-','b'),
                'section_status' =>1,
            ],
        ];
        Section::insert($section);
    }
}
