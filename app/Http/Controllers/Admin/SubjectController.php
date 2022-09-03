<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    
    {
        return view('backend.academic.subject.manage',[
            'subjects'=>Subject::all(),
            'classes'=>StudentClass::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.subject.create',[
            'classes'=>StudentClass::all(),
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
        Subject::saveData($request);
        return redirect()->route('subjects.index')->with('success','Subject Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        return view('backend.academic.subject.details',[
            'subject' => Subject::find($id)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('backend.academic.subject.create',[
            'classes'=>StudentClass::all(),
            'subject'=>Subject::where('slug',$slug)->first(),
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
        Subject::updateData($request,$id);
        return redirect()->route('subjects.index')->with('success','Subject Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject=Subject::find($id);
        if (file_exists($subject->subject_book_image)){
            unlink($subject->subject_book_image);
        }
        $subject->delete();
        return redirect()->route('subjects.index')->with('success','Subject Delete successfully');
    }
}
