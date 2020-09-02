<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guidian extends Model
{
    protected $fillable = [
        'fathers_name',
        'mothers_email',
        'parents_contact',
    ];
}
