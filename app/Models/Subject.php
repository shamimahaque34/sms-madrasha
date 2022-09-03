<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable=[
        'class_id',
        'group_id',
        'slug',
        'subject_name',
        'subject_type',
        'pass_mark',
        'final_mark',
        'subject_author',
        'subject_code',
        'subject_book_image',
        'label',
        'is_for_graduation',
        'is_main_subject',
        'is_optional',
        'note',
    ];


    protected static $subject;

    public static function saveData($request){
        
        self::$subject = new Subject();

        self::$subject->class_id                =$request->class_id;
        self::$subject->group_id                =$request->group_id;
        self::$subject->subject_name            =$request->subject_name;
        self::$subject->slug                    =str_replace(' ','-',$request->subject_name);
        self::$subject->subject_type            =$request->subject_type;
        self::$subject->pass_mark               =$request->pass_mark;
        self::$subject->final_mark               =$request->final_mark;
        self::$subject->subject_author          =$request->subject_author;
        self::$subject->subject_code            =$request->subject_code;
        self::$subject->subject_book_image      =saveImage($request->file('subject_book_image'),'./backend/assets/subjectBooks/');
        self::$subject->label                   =$request->label;
        self::$subject->is_for_graduation       =$request->is_for_graduation;
        self::$subject->is_main_subject         =$request->is_main_subject;
        self::$subject->is_optional             =$request->is_optional;
        self::$subject->note                    =$request->note;
        self::$subject->save();
    }

    public static function updateData($request, $id)
    {   
        self::$subject = Subject::findOrFail($id);

        self::$subject->class_id                =$request->class_id;
        self::$subject->group_id                =$request->group_id;
        self::$subject->subject_name            =$request->subject_name;
        self::$subject->slug                    =str_replace(' ','-',$request->subject_name);
        self::$subject->subject_type            =$request->subject_type;
        self::$subject->pass_mark               =$request->pass_mark;
        self::$subject->final_mark               =$request->final_mark;
        self::$subject->subject_author          =$request->subject_author;
        self::$subject->subject_code            =$request->subject_code;
        self::$subject->subject_book_image      =saveImage($request->file('subject_book_image'),'./backend/assets/img/subjectBooks/','book',self::$subject->subject_book_image,);
        self::$subject->label                   =$request->label;
        self::$subject->is_for_graduation       =$request->is_for_graduation;
        self::$subject->is_main_subject         =$request->is_main_subject;
        self::$subject->is_optional             =$request->is_optional;
        self::$subject->note                    =$request->note;
        self::$subject->save();
    }

    public function class(){
        return $this->belongsTo('App\Models\StudentClass');
    }


}
