<?php

namespace App\Models\Sonko;

class Sonko extends \App\Models\BaseModel
{
    protected $fillable = [
        'title',
        'phone',
        'email',
        'workers',
        'head',
        'description',
        'address',
        'status',
    ];
}
