<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerSection extends Model
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
        'title_dynamic' => 'array',
    ];
}