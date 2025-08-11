<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\StudentStatusEnum;
use App\Models\Course;
use Carbon\Carbon;

class Student extends Model
{
  
  
     use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'status',
        'course_id',
    ];

    public $timestamps = false;
    protected $casts = [
        'date_of_birth' => 'date',
        'status' => StudentStatusEnum::class,
    ];
    protected $appends = [
        'full_name',
        'age',
        'gender_name',
        'course_name',
        'status_name',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this['first_name'] . ' ' . $this['last_name'],
        );
    }

    protected function age(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->attributes['date_of_birth'])->age,
        );
    }

    protected function genderName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->attributes['gender'] === 1 ? 'Male' : 'Female',
        );
    }

    protected function courseName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->course ? $this->course->name : null,
        );
    }

    protected function statusName(): Attribute
    {
        return Attribute::make(
            get: fn () => StudentStatusEnum::asArray()[$this->status->value] ?? 'Không xác định',
        );
    }


}
  // use HasFactory;
    //     protected $fillable = [
    //     'first_name',
    //     'last_name',
    //     'gender',
    //     'date_of_birth',
    //     'status',
    //     'course_id',
    // ];
    // public $timestamps = false;

    // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }

    //  protected function fullName(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => $this['first_name'] . ' ' . $this['last_name'],
    //     );
    // }
    //  protected function age(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn () => Carbon::parse($this->attributes['date_of_birth'])->age,
    //     );
    // }
    //  protected function genderName(): Attribute
    // {
    //     return Attribute::make(
    //       get: fn () => $this->attributes['gender'] === 1 ? 'Male' : 'Female',
    //     );
    // }