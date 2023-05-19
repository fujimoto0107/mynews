<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'gender',
        'hobby',
        'introduction',
    ];

    public static $rules = [
        'name' => 'required|string|max:255',
        'gender' => 'required|string|max:255',
        'hobby' => 'required|string|max:255',
        'introduction' => 'required|string',
    ];
}