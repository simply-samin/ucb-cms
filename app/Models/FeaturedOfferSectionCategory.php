<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedOfferSectionCategory extends Model
{
    protected $table = 'featured_offer_section_category';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function section()
    {
        return $this->belongsTo(FeaturedOfferSection::class, 'featured_offer_section_id');
    }

    public function category()
    {
        return $this->belongsTo(OfferCategory::class, 'offer_category_id');
    }
}