<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OffersDealsSection;

class OffersDealsSectionSeeder extends Seeder
{
    public function run(): void
    {
        OffersDealsSection::firstOrCreate(
            [
                'title_static' => 'Unbeatable', // use a unique field as identifier
            ],
            [
                'super_title'   => 'Catch the Hottest Discounts',
                'title_static'  => 'Unbeatable',
                'title_dynamic' => ['Offers', 'Deals', 'Rewards'],
                'is_active'     => true,
            ]
        );
    }
}