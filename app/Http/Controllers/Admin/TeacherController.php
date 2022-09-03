<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\TeacherEducationalCerts;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $teacher;

    public function index()
    {
        return view('backend.user-management.teacher.manage',[
            'users'=> User::all(),
            'teachers'=>Teacher::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user-management.teacher.add',[
            'user'=> User::all()->last(),
            'teachers'=>Teacher::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->user = User::saveData($request);
        $this->teacher = Teacher::saveData($request, $this->user);
       
        TeacherEducationalCerts::saveTeacherEducationalCerts($request, $this->teacher,);

        return redirect()->route('teachers.index')->with('success','Teacher Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('backend.user-management.teacher.add',[
            'user'=> User::all()->last(),
            'teacher'=>Teacher::where('slug',$slug)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Teacher::updateData($request,$id);
        if($request->file('educational_certs'))
        {
            TeacherEducationalCerts ::updateTeacherEducationalCerts($request,$id);
        }

        return redirect()->route('teachers.index')->with('success','Teacher Update successfully');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   $user=User::find($id);
        $teacher=Teacher::find($id);
        if (file_exists($teacher->image)){
            unlink($teacher->image);
        }
        $user->delete();
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success','Teacher Delete successfully');
        
    }
}
