<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExploreCardSection;

class ExploreCardSectionSeeder extends Seeder
{
    public function run(): void
    {
        if (ExploreCardSection::count() === 0) {
            $records = [
                [
                    'media_path' => 'explore/mountains.jpg',
                    'media_type' => 'image',

                    'scale' => 1.1,
                    'spin_clockwise' => true,
                    'spin_speed' => 0.8,

                    'super_title' => 'Adventure Awaits',
                    'title_static' => 'Explore the Mountains',
                    'title_dynamic' => [
                        ['value' => 'unforgettable moments'],
                        ['value' => 'breathtaking views'],
                        ['value' => 'adventures that matter'],
                    ],
                    'subtitle' => 'Discover nature’s finest peaks and scenery.',

                    'cta_primary_label' => 'Learn More',
                    'cta_primary_link' => '/mountains',

                    'cta_secondary_label' => 'Book Now',
                    'cta_secondary_link' => '/book-trip',
                ],

                [
                    'media_path' => 'explore/beach.jpg',
                    'media_type' => 'image',

                    'scale' => 1.0,
                    'spin_clockwise' => false,
                    'spin_speed' => 1.2,

                    'super_title' => 'The Calm Beyond',
                    'title_static' => 'Escape to the Sea',
                    'title_dynamic' => [
                        ['value' => 'lasting memories'],
                        ['value' => 'peace & sunshine'],
                        ['value' => 'relaxation and joy'],
                    ],
                    'subtitle' => 'Experience the serenity of the open ocean.',

                    'cta_primary_label' => 'Discover More',
                    'cta_primary_link' => '/sea',

                    'cta_secondary_label' => 'Plan Trip',
                    'cta_secondary_link' => '/plan',
                ],
            ];

            foreach ($records as $record) {
                ExploreCardSection::create($record);
            }
        }
    }
}