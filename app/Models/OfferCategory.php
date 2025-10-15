<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferCategory extends Model
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

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function featuredOfferSections()
    {
        return $this->belongsToMany(FeaturedOfferSection::class, 'featured_offer_section_category')
            ->withPivot(['media_type', 'media_image', 'sort'])
            ->withTimestamps()
            ->orderByPivot('sort');
    }
}