<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable =[
        'section_name',
        'slug',
        'section_capacity',
        'section_note',
        'section_status'];
        
    protected static $section;


    protected static function saveSection($request)
    {
        self::$section = new Section();
        self::$section->section_name =$request->section_name;
        self::$section->slug                    =str_replace(' ','-',$request->section_name);
        self::$section->section_capacity =$request->section_capacity;
        self::$section->section_note =$request->section_note;
        self::$section->section_status =$request->section_status;
        self::$section->save();
    }
    protected static function updateSection($request,$id)
    {
        self::$section = Section::find($id);
        self::$section->section_name =$request->section_name;
        self::$section->slug                    =str_replace(' ','-',$request->section_name);
        self::$section->section_capacity =$request->section_capacity;
        self::$section->section_note =$request->section_note;
        self::$section->section_status =$request->section_status;
        self::$section->save();

    }

    protected static function deleteSection($id)
    {
        self::$section = Section::find($id);
        self::$section->delete();
    }


}
