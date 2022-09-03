<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuranTranslationProvider extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'brand_name',
        'translated_by',
        'language[bangla,english,arabic]',
        'slug',
        'status',
    ];


    protected static $provider;

    public static function saveData($request)
    {
       self::$provider = new QuranTranslationProvider();
       QuranTranslationProvider::insertData($request);
    }

    public static function updateData($request,$id)
    {
      self::$provider = QuranTranslationProvider::find($id);
      QuranTranslationProvider::insertData($request,self::$provider);
    }

    public static function insertData($request,$provider = null)
    {
        self::$provider->brand_name    = $request->brand_name ;
        self::$provider->translated_by = $request->translated_by ;
        self::$provider->language      = $request->language;
        self::$provider->slug          = str_replace(' ','-',$request->brand_name);
        self::$provider->status        = $request->status;
        self::$provider->save();
    }

    protected $searchableFields = ['*'];

    protected $table = 'quran_translation_providers';

    public function quranTranslations()
    {
        return $this->hasMany(QuranTranslation::class);
    }
}
