<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedOfferSection extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function categories()
    {
        return $this->hasMany(FeaturedOfferSectionCategory::class, 'featured_offer_section_id');
    }
}