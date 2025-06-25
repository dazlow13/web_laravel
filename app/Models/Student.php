<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    public $timestamps = false;

     protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this['first_name'] . ' ' . $this['last_name'],
        );
    }
     protected function age(): Attribute
    {
        return Attribute::make(
            get: fn () => Carbon::parse($this->date_of_birth)->age,
        );
    }
     protected function genderName(): Attribute
    {
        return Attribute::make(
          get: fn () => $this->gender === 1 ? 'Male' : 'Female',
        );
    }
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
    ];

}
