<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedOfferSection extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'title_dynamic' => 'array',
    ];

    public function categories()
    {
        return $this->belongsToMany(OfferCategory::class, 'featured_offer_section_category')
            ->withPivot(['media_type', 'media_image', 'sort'])
            ->withTimestamps()
            ->orderByPivot('sort');
    }
}