<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (HeroSection::count() === 0) {
                $slides = [
                    [
                        'title'            => 'Your Campaign',
                        'subtitle'         => 'Text will show here',
                        'background_type'  => 'image',
                        'background_media' => null,  
                        'cta_label'        => 'Learn More',
                        'cta_link'         => '#',
                        'text_alignment'   => 'center',
                        'order'            => 1,
                    ],
                    [
                        'title'            => 'Banking Beyond the Ordinary',
                        'subtitle'         => 'Experience premium financial solutions with UCB.',
                        'background_type'  => 'image',
                        'background_media' => null,
                        'cta_label'        => 'Explore Cards',
                        'cta_link'         => '#cards',
                        'text_alignment'   => 'left',
                        'order'            => 2,
                    ],
                    [
                        'title'            => 'A Gateway to Lasting Memories',
                        'subtitle'         => 'Enjoy exclusive offers and rewards every day.',
                        'background_type'  => 'image',
                        'background_media' => null,
                        'cta_label'        => 'Get Started',
                        'cta_link'         => '#apply',
                        'text_alignment'   => 'right',
                        'order'            => 3,
                    ],
                ];

            foreach ($slides as $slide) {
                HeroSection::create($slide);
            }
        }
    }
}