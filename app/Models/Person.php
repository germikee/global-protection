<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'age',
        'blood',
        'born',
        'born_place',
        'cellphone',
        'city',
        'country',
        'eye_color',
        'father_name',
        'gender',
        'height',
        'national_code',
        'religion',
        'system_id',
        'weight',
        'avatar'
    ];

    /**
     * Scope a query to only include gender.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGender($query, $value = 'male')
    {
        return $query->where('gender', $value);
    }
}
