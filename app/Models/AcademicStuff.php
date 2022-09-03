<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcademicStuff extends Model
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
        'designation_id',
        'dob',
        'dob_timestamp',
        'gender',
        'religion',
        'jod',
        'jod_timestamp',
        'image',
        'address',
        'highest_education',
        'created_by',
        'slug',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'academic_stuffs';

    protected $casts = [
        'dob_timestamp' => 'datetime',
        'jod_timestamp' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function stuff_creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    public function userSubmittedCertificates()
    {
        return $this->morphMany(
            UserSubmittedCertificate::class,
            'user_submitted_certificateable'
        );
    }

    public function attendances()
    {
        return $this->morphMany(Attendance::class, 'attendanceable');
    }
}
