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
                    'super_title' => 'Welcome to UCB',
                    'title' => 'Your Campaign',
                    'subtitle' => 'Text will show here',
                    'cta_label' => 'Learn More',
                    'cta_link' => '#',
                    'sort' => 1,
                    'is_active' => true,
                ],
                [
                    'media_type' => 'image',
                    'media_path' => 'hero/slide2.jpg',
                    'super_title' => 'Smart Banking',
                    'title' => 'Banking Beyond the Ordinary',
                    'subtitle' => 'Experience premium financial solutions with UCB.',
                    'cta_label' => 'Explore Cards',
                    'cta_link' => '#cards',
                    'sort' => 2,
                    'is_active' => true,
                ],
                [
                    'media_type' => 'image',
                    'media_path' => 'hero/slide3.jpg',
                    'super_title' => 'Rewards for You',
                    'title' => 'A Gateway to Lasting Memories',
                    'subtitle' => 'Enjoy exclusive offers and rewards every day.',
                    'cta_label' => 'Get Started',
                    'cta_link' => '#apply',
                    'sort' => 3,
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
                'super_title' => 'Our Story',
                'title' => 'About Our Mission',
                'subtitle' => 'Driven by innovation and customer trust since 1990.',
                'cta_label' => 'Read More',
                'cta_link' => '/about',
                'sort' => 0,
                'is_active' => true,
            ]);
        }
    }
}