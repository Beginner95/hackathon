<?php

namespace App\Models\Destitute;

use App\Models\BaseModel;
use App\Models\Sonko\Sonko;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Destitute extends BaseModel
{
    protected $fillable = [
        'full_name',
        'phone',
        'address',
        'added_at',
        'deleted_at',
        'sonko_id',
        'family_counts'
    ];

    public function sonko(): HasOne
    {
        return $this->hasOne(Sonko::class, 'id', 'sonko_id');
    }
}
