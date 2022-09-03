<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuranChapter;
use App\Models\QuranVerse;


class QuranVerseController extends Controller
{
    private $quranChapter;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.quran-verse.manage',[
            'chapters'=>QuranChapter::all(),
            'verses' =>QuranVerse::all(),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.quran-verse.add',[
            'chapters'=>QuranChapter::all(),
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
        $this->validate($request, [
            'quran_chapter_id' => 'required',
        ]);

        QuranVerse::saveData($request);
        return redirect()->route('quran-verses.index')->with('success','Verse Create successfully');
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
        return view('backend.academic.quran-verse.add',[
            'chapters'=>QuranChapter::all(),
            'verse'=>QuranVerse::where('slug',$slug)->first(),
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
        QuranVerse::updateData($request,$id);
        return redirect()->route('quran-verses.index')->with('success','Verse Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $verse=QuranVerse::find($id);
        if (file_exists($verse->audio)){
            unlink($verse->audio);
        }
        $verse->delete();
        return redirect()->route('quran-verses.index')->with('success','Verse Delete successfully');
    }

    

    
    
}
