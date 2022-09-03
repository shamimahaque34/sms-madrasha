<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuranTranslationProvider;

class QuranTranslationProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.academic.quran-translation-provider.manage',[
            'providers'=>QuranTranslationProvider::all(),
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.academic.quran-translation-provider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        QuranTranslationProvider::saveData($request);
        return redirect()->route('quran-translation-providers.index')->with('success','Quran Translation Provioder Create successfully');
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
        return view('backend.academic.quran-translation-provider.add',[
            'provider'=>QuranTranslationProvider::where('slug',$slug)->first(),
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
        QuranTranslationProvider::updateData($request,$id);
        return redirect()->route('quran-translation-providers.index')->with('success','Quran Translation Provider Update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provider=QuranTranslationProvider::find($id);
        $provider->delete();
        return redirect()->route('quran-translation-providers.index')->with('success','Quran Translation Provider Delete successfully');
    }
}
