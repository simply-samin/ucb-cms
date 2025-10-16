<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffersDealsSection extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'title_dynamic' => 'array',
        'is_active' => 'boolean',
    ];
}