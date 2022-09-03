<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $subject =[
        [
            'id' =>'1',
            'class_id'=>'1',
            'group_id' =>'a',
            'subject_name' =>'a',
            'slug' =>str_replace(' ','-','a'),
            'subject_type'=>'main',
            'pass_mark' =>'20',
            'final_mark' =>'100',
            'subject_author' =>'a',
            'subject_code' =>'1',
            'subject_book_image' =>'',
            'label'=>'a',
            'is_for_graduation'=>'0',
            'is_main_subject' =>'1',
            'is_optional' =>'0',
            'note' =>'',
        ],

        [
            'id' =>'2',
            'class_id'=>'2',
            'group_id' =>'b',
            'subject_name' =>'b',
            'slug' =>str_replace(' ','-','b'),
            'subject_type'=>'main',
            'pass_mark' =>'20',
            'final_mark' =>'100',
            'subject_author' =>'b',
            'subject_code' =>'2',
            'subject_book_image' =>'',
            'label'=>'b',
            'is_for_graduation'=>'0',
            'is_main_subject' =>'1',
            'is_optional' =>'0',
            'note' =>'',
        ],
        ];

        Subject::insert($subject);
       
    
}
}
