<?php

namespace Database\Seeders;

use App\Models\StudentClass;
use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $class =[
            [
               'id'   => '1',
               'class_name' =>'one',
               'class_numeric' =>'1',
               'slug' =>str_replace(' ','-','one'),
               'class_note'=> '',
               'class_label'=>'one',
               'class_status'=>1,
                
            ],

            [
                'id'   => '2',
                'class_name' =>'two',
                'class_numeric' =>'2',
                'slug' =>str_replace(' ','-','two'),
                'class_note'=> '',
                'class_label'=>'two',
                'class_status'=>1,
                 
             ],
            ];

            StudentClass::insert($class);
    }
}
