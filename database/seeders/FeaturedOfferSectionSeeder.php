<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeaturedOfferSection;
use App\Models\OfferCategory;

class FeaturedOfferSectionSeeder extends Seeder
{
    public function run(): void
    {
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
                'media_image'    => null,
                'sort'           => 1,
            ],
            [
                'category_title' => 'Groceries',
                'super_title'    => 'Enjoy Daily Perks at Your Favorite Cafés',
                'title'          => 'Moments are Brewed to Perfection',
                'subtitle'       => null,
                'media_type'     => 'image',
                'media_image'    => null,
                'sort'           => 2,
            ],
            [
                'category_title' => 'Fashion',
                'super_title'    => 'Shop Smarter with Unbeatable Savings',
                'title'          => 'Style is a State of Mind',
                'subtitle'       => null,
                'media_type'     => 'image',
                'media_image'    => null,
                'sort'           => 3,
            ],
            [
                'category_title' => 'Others',
                'super_title'    => 'Enjoy Daily Perks at Your Favorite Shops',
                'title'          => 'Every Swipe Transports You to Wider Aisles',
                'subtitle'       => null,
                'media_type'     => 'image',
                'media_image'    => null,
                'sort'           => 4,
            ],
        ];

        foreach ($grids as $grid) {
            $category = OfferCategory::where('title', $grid['category_title'])->first();

            if (! $category) {
                continue;
            }

            $section->categories()->attach($category->id, [
                'super_title' => $grid['super_title'],
                'title'       => $grid['title'],
                'subtitle'    => $grid['subtitle'],
                'media_type'  => $grid['media_type'],
                'media_image' => $grid['media_image'],
                'sort'        => $grid['sort'],
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}