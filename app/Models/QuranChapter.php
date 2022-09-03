<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranChapter extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'arabic_name',
        'bangla_name',
        'english_name',
        'chapter_serial',
        'total_verse',
        'surah_origin',
        'slug',
        'status',
    ];

    protected static $chapter;

    public static function saveData($request)
    {
       self::$chapter = new QuranChapter();
       QuranChapter::insertData($request);
    }

    public static function updateData($request,$id)
    {
      self::$chapter = QuranChapter::find($id);
      QuranChapter::insertData($request,self::$chapter);
    }

    public static function insertData($request,$chapter = null)
    {
        self::$chapter->arabic_name    = $request->arabic_name;
        self::$chapter->bangla_name    = $request->bangla_name;
        self::$chapter->english_name   = $request->english_name;
        self::$chapter->chapter_serial = $request->chapter_serial;
        self::$chapter->total_verse    = $request->total_verse;
        self::$chapter->surah_origin   = $request->surah_origin;
        self::$chapter->slug           = str_replace(' ','-',$request->arabic_name);
        self::$chapter->status         = $request->status;
        self::$chapter->save();
    }



    protected $searchableFields = ['*'];

    protected $table = 'quran_chapters';

    public function quranVerses()
    {
        return $this->hasMany(QuranVerse::class);
    }

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }
}
