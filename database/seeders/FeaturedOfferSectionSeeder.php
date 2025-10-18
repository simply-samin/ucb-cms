<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeaturedOfferSection;
use App\Models\FeaturedOfferSectionCategory;
use App\Models\OfferCategory;

class FeaturedOfferSectionSeeder extends Seeder
{
    public function run(): void
    {
        // Don’t reseed if it already exists
        if (FeaturedOfferSection::count() > 0) {
            return;
        }

        $section = FeaturedOfferSection::create([
            'title_prefix' => 'Experiences',
            'title_accent' => 'Beyond the Ordinary',
        ]);

        $grids = [
            [
                'category_title' => 'Dining',
                'super_title'    => 'Savor Exclusive Discounts at Top Restaurants',
                'title'          => 'Where the World is Your Oyster',
                'subtitle'       => null,
                'media_type'     => 'image',
                'media_image'    => 'https://ucbcdn.example.com/media/featured-dining.jpg',
                'sort'           => 1,
            ],
            [
                'category_title' => 'Groceries',
                'super_title'    => 'Save More on Everyday Essentials',
                'title'          => 'Smart Shopping Starts Here',
                'subtitle'       => null,
                'media_type'     => 'image',
                'media_image'    => 'https://ucbcdn.example.com/media/featured-groceries.jpg',
                'sort'           => 2,
            ],
            [
                'category_title' => 'Fashion',
                'super_title'    => 'Shop Smarter with Unbeatable Savings',
                'title'          => 'Style is a State of Mind',
                'subtitle'       => null,
                'media_type'     => 'image',
                'media_image'    => 'https://ucbcdn.example.com/media/featured-fashion.jpg',
                'sort'           => 3,
            ],
            [
                'category_title' => 'Others',
                'super_title'    => 'Unlock More Everyday Rewards',
                'title'          => 'Every Swipe Brings New Adventures',
                'subtitle'       => null,
                'media_type'     => 'image',
                'media_image'    => 'https://ucbcdn.example.com/media/featured-others.jpg',
                'sort'           => 4,
            ],
        ];

        foreach ($grids as $grid) {
            $category = OfferCategory::where('title', $grid['category_title'])->first();

            if (! $category) {
                continue;
            }

            FeaturedOfferSectionCategory::create([
                'featured_offer_section_id' => $section->id,
                'offer_category_id'          => $category->id,
                'super_title'                => $grid['super_title'],
                'title'                      => $grid['title'],
                'subtitle'                   => $grid['subtitle'],
                'media_type'                 => $grid['media_type'],
                'media_image'                => $grid['media_image'],
                'sort'                       => $grid['sort'],
            ]);
        }
    }
}