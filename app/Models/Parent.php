<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parent extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'user_id',
        'username',
        'name_english',
        'name_bangla',
        'email',
        'phone',
        'fathers_profession',
        'mothers_profession',
        'dob',
        'dob_timestamp',
        'gender',
        'religion',
        'image',
        'address',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'dob_timestamp' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
