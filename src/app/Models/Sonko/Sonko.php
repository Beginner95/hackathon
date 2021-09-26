<?php

namespace App\Models\Sonko;

use App\Models\Destitute\Destitute;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function destitutes(): HasMany
    {
        return $this->hasMany(Destitute::class);
    }
}
