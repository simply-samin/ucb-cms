<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExploreCardSection extends Model
{
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'keywords' => 'array',
        'title_dynamic' => 'array',
        'spin_clockwise' => 'boolean',
        'scale' => 'float',
        'spin_speed' => 'float',
    ];
}