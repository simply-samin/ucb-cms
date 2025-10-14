<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        if (HeroSection::count() === 0) {

            $carouselHero = HeroSection::create([
                'name' => 'Homepage Carousel',
                'slug' => 'homepage-carousel',
                'layout_type' => 'carousel',
                'is_active' => true,
            ]);

            $carouselSlides = [
                [
                    'media_type' => 'image',
                    'media_path' => 'hero/slide1.jpg',
                    'title' => 'Your Campaign',
                    'subtitle' => 'Text will show here',
                    'cta_label' => 'Learn More',
                    'cta_link' => '#',
                    'order' => 1,
                    'is_active' => true,
                ],
                [
                    'media_type' => 'image',
                    'media_path' => 'hero/slide2.jpg',
                    'title' => 'Banking Beyond the Ordinary',
                    'subtitle' => 'Experience premium financial solutions with UCB.',
                    'cta_label' => 'Explore Cards',
                    'cta_link' => '#cards',
                    'order' => 2,
                    'is_active' => true,
                ],
                [
                    'media_type' => 'image',
                    'media_path' => 'hero/slide3.jpg',
                    'title' => 'A Gateway to Lasting Memories',
                    'subtitle' => 'Enjoy exclusive offers and rewards every day.',
                    'cta_label' => 'Get Started',
                    'cta_link' => '#apply',
                    'order' => 3,
                    'is_active' => true,
                ],
            ];

            foreach ($carouselSlides as $slide) {
                $carouselHero->contents()->create($slide);
            }

            $staticHero = HeroSection::create([
                'name' => 'About Page Hero',
                'slug' => 'about-hero',
                'layout_type' => 'static',
                'is_active' => true,
            ]);

            $staticHero->contents()->create([
                'media_type' => 'image',
                'media_path' => 'hero/about-banner.jpg',
                'title' => 'About Our Mission',
                'subtitle' => 'Driven by innovation and customer trust since 1990.',
                'cta_label' => 'Read More',
                'cta_link' => '/about',
                'order' => 0,
                'is_active' => true,
            ]);
        }
    }
}