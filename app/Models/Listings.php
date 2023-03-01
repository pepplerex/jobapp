<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listings extends Model
{
    protected $fillable = [

        'company',
        'title',
        'location',
        'email',
        'website',
        'tags',
        'description',
        'logo',
        'user_id'

    ];

    use HasFactory;

}
