<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranVerse extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'quran_chapter_id',
        'verse_arabic',
        'verse_bangla',
        'verse_english',
        'audio',
        'slug',
        'status',
    ];

    protected static $verse;

    public static function saveData($request)
    {
       self::$verse = new QuranVerse();
       QuranVerse::insertData($request);
    }

    public static function updateData($request,$id)
    {
      self::$verse = QuranVerse::find($id);
      QuranVerse::insertData($request,self::$verse);
    }

    public static function insertData($request,$verse = null)
    {
        self::$verse->quran_chapter_id = $request->quran_chapter_id;
        self::$verse->verse_arabic     = $request->verse_arabic;
        self::$verse->verse_bangla     = $request->verse_bangla;
        self::$verse->verse_english    = $request->verse_english;
        self::$verse->audio            = isset($verse) ? saveAudio($request->file('audio'),'./backend/assets/audio/verseAudios/','audio',self::$verse->audio,) : saveAudio($request->file('audio'),'./backend/assets/audio/verseAudios/','audio','',) ;
        self::$verse->slug             = str_replace(' ','-',$request->verse_arabic);
        self::$verse->status           = $request->status;
        self::$verse->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'quran_verses';

    public function quranChapter()
    {
        return $this->belongsTo(QuranChapter::class);
    }

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }
}
