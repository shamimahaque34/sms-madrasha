<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $fillable =[
        'class_name',
        'slug',
        'class_numeric',
        'class_note',
        'class_label',
        'class_status'];
    protected static $classes;


    protected static function saveClasses($request)
    {
        self::$classes =new StudentClass();
        self::$classes->class_name = $request->class_name;
        self::$classes->slug                    =str_replace(' ','-',$request->class_name);
        self::$classes->class_numeric = $request->class_numeric;
        self::$classes->class_note = $request->class_note;
        self::$classes->class_label = $request->class_label;
        self::$classes->class_status = $request->class_status;
        self::$classes->save();
    }
    protected static function updateClasses($request,$id)
    {
        self::$classes =StudentClass::find($id);
        self::$classes->class_name = $request->class_name;
        self::$classes->slug                    =str_replace(' ','-',$request->class_name);
        self::$classes->class_numeric = $request->class_numeric;
        self::$classes->class_note = $request->class_note;
        self::$classes->class_label = $request->class_label;
        self::$classes->class_status = $request->class_status;
        self::$classes->save();
    }
    protected static function deleteClass($id)
    {
        self::$classes =StudentClass::find($id);
        self::$classes->delete();
    }

}
