<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'name',
        'slug',
        'email',
        'phone',
        'designation',
        'date_of_birth',
        'gender',
        'religion',
        'joining_date',
        'image',
        'address',
        'user_name',
        'subject',
        'highest_education',
        'created_by',
        'password',
        'status',
    ];

    protected static $teacher;

    public static function saveData($request, $user){
        
        self::$teacher = new Teacher();

        self::$teacher->user_id            =$user->id;
        self::$teacher->name               =$request->name;
        self::$teacher->email              =$request->email;
        self::$teacher->slug               =str_replace(' ','-',$request->name);
        self::$teacher->phone              =$request->phone;
        self::$teacher->designation        =$request->designation;
        self::$teacher->date_of_birth      =$request->date_of_birth ;
        self::$teacher->gender             =$request->gender;
        self::$teacher->religion           =$request->religion;
        self::$teacher->joining_date       =$request->joining_date ;
        self::$teacher->image              =saveImage($request->file('image'),'./backend/assets/teacherImages/');
        self::$teacher->address            =$request->address;
        self::$teacher->user_name          =$request->user_name;
        self::$teacher->subject            =$request->subject;
        self::$teacher->highest_education  =$request->highest_education;
        self::$teacher->created_by         = Auth::user()->name;
        self::$teacher->password           =$request->password ;
        self::$teacher->status             =$request->status;
        self::$teacher->save();
        return  self::$teacher;
        
    }

    public static function updateData($request,$id)
    {   
        self::$teacher = Teacher::findOrFail($id);

        // self::$teacher->user_id            =$user->id;
        self::$teacher->name               =$request->name;
        self::$teacher->email              =$request->email;
        self::$teacher->slug               =str_replace(' ','-',$request->name);
        self::$teacher->phone              =$request->phone;
        self::$teacher->designation        =$request->designation;
        self::$teacher->date_of_birth      =$request->date_of_birth ;
        self::$teacher->gender             =$request->gender;
        self::$teacher->religion           =$request->religion;
        self::$teacher->joining_date      =$request->joining_date ;
        self::$teacher->image              =saveImage($request->file('image'),'./backend/assets/teacherImages/','image',self::$teacher->image,);
        self::$teacher->address            =$request->address;
        self::$teacher->user_name          =$request->user_name;
        self::$teacher->subject            =$request->subject;
        self::$teacher->highest_education  =$request->highest_education;
        self::$teacher->created_by         = Auth::user()->name ;
        self::$teacher->password           =$request->password ;
        self::$teacher->status             =$request->status;
        self::$teacher->save();
    }


    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function teacher_educational_certs()
    {
        return $this->hasMany('App\Models\TeacherEducationalCerts');
    }

}
