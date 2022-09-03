<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuranChapter;
use App\Models\QuranVerse;
use App\Models\QuranTranslationProvider;
use App\Models\QuranTranslation;



class QuranTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.quran-translation.manage',[
            'chapters'=>QuranChapter::all(),
            'verses' =>QuranVerse::all(),
            'providers'=>QuranTranslationProvider::all(),
            'translations' =>QuranTranslation::all(),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.quran-translation.add',[
            'chapters'=>QuranChapter::all(),
            'verses' =>QuranVerse::all(),
            'providers'=>QuranTranslationProvider::all(),
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
            'quran_chapter_id'              => 'required',
            'quran_verse_id'                => 'required',
            'quran_translation_provider_id' => 'required',
            
        ]); 

        QuranTranslation::saveData($request);
        return redirect()->route('quran-translations.index')->with('success','Quran Translation Create successfully');
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
        return view('backend.academic.quran-translation.add',[
            'chapters'=>QuranChapter::all(),
            'verses' =>QuranVerse::all(),
            'providers'=>QuranTranslationProvider::all(),
            'translation'=>QuranTranslation::where('slug',$slug)->first(),
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
        QuranTranslation::updateData($request,$id);
        return redirect()->route('quran-translations.index')->with('success','Quran Translation Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $translation=QuranTranslation::find($id);
        $translation->delete();
        return redirect()->route('quran-translations.index')->with('success','Quran Translation  Delete successfully');
    }


    public function getVerse (Request $request)
    {
        $this->quranChapter = QuranVerse::where('quran_chapter_id', $request->quran_chapter_id)->get();  
        return json_encode($this->quranChapter); 
    }


   
}
