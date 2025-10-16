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

    public function featuredSectionCategories()
    {
        return $this->hasMany(FeaturedOfferSectionCategory::class, 'offer_category_id');
    }
}