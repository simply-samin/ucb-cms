<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;
use App\Models\OfferCategory;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        // Seed only if there are no existing records
        if (OfferCategory::count() > 0 || Offer::count() > 0) {
            return;
        }

        $categories = [
            [   
                'media_type'  => 'image',
                'media_path'  => 'https://example.com/media/category-dining.jpg',
                'super_title' => 'Fine Dining',
                'title'       => 'Dining',
                'subtitle'    => 'Savor exclusive discounts at top restaurants',
                'is_active'   => true,
                'offers' => [
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://example.com/media/le-bistro-logo.png',
                        'super_title'  => 'Gourmet Delight',
                        'title'        => '20% Off on À La Carte',
                        'subtitle'     => 'Available on all dinner reservations',
                        'description'  => 'Enjoy 20% off on à la carte menu items when you book a table through our app.',
                        'address'      => 'Le Bistro, Gulshan 2, Dhaka',
                        'eligibility'  => 'Applicable for all members. Valid for dine-in only.',
                        'validity'     => 'Valid until December 31, 2025',
                        'is_active'    => true,
                    ],
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://example.com/media/umami-logo.png',
                        'super_title'  => 'Taste of Japan',
                        'title'        => 'Sushi Platter – Buy 1 Get 1 Free',
                        'subtitle'     => 'Exclusive BOGO on Signature Platters',
                        'description'  => 'Buy any sushi platter and get another of the same value free.',
                        'address'      => 'Umami Sushi, Banani 11, Dhaka',
                        'eligibility'  => 'Only available for Gold Tier members. Dine-in only.',
                        'validity'     => 'Valid from November 1, 2025 – January 15, 2026',
                        'is_active'    => true,
                    ],
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://example.com/media/beanbrew-logo.png',
                        'super_title'  => 'Coffee Moments',
                        'title'        => 'Flat 15% Off',
                        'subtitle'     => 'On any coffee and dessert combo',
                        'description'  => 'Enjoy a flat 15% discount on any coffee and dessert combo at Bean & Brew.',
                        'address'      => 'Bean & Brew, Dhanmondi 8, Dhaka',
                        'eligibility'  => 'Valid for all members. Not applicable on takeaways.',
                        'validity'     => 'Offer valid till December 31, 2025',
                        'is_active'    => true,
                    ],
                ],
            ],
            [                   
                'media_type'  => 'image',
                'media_path'  => 'https://example.com/media/category-fashion.jpg',
                'super_title' => 'Style That Speaks',
                'title'       => 'Fashion',
                'subtitle'    => 'Style with exclusive discounts on premium brands',
                'is_active'   => true,
                'offers' => [
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://example.com/media/urbanvogue-logo.png',
                        'super_title'  => 'Summer Exclusives',
                        'title'        => '25% Off All Summer Collection',
                        'subtitle'     => 'Redeem in-store and online',
                        'description'  => 'Get 25% off all apparel and accessories from our summer line.',
                        'address'      => 'Urban Vogue, Bashundhara City Mall, Dhaka',
                        'eligibility'  => 'Applicable to all cardholders. Valid for in-store and online purchases.',
                        'validity'     => 'Valid till September 30, 2025',
                        'is_active'    => true,
                    ],
                ],
            ],
            [   
                'media_type'  => 'image',
                'media_path'  => 'https://example.com/media/category-saving.jpg',
                'super_title' => 'Smart Savings',
                'title'       => 'Groceries',
                'subtitle'    => 'Save more on your everyday essentials',
                'is_active'   => true,
                'offers' => [
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://example.com/media/dailymart-logo.png',
                        'super_title'  => 'Weekend Bonus',
                        'title'        => '10% Cashback on Weekend Purchases',
                        'subtitle'     => 'Applicable every Friday & Saturday',
                        'description'  => 'Enjoy 10% cashback on your total grocery bill every weekend at DailyMart.',
                        'address'      => 'Available across all DailyMart outlets',
                        'eligibility'  => 'Minimum spend BDT 2,000 required. Valid for all members.',
                        'validity'     => 'Valid until December 31, 2025',
                        'is_active'    => true,
                    ],
                ],
            ],
            [
                'media_type'  => 'image',
                'media_path'  => 'https://example.com/media/category-other.jpg',
                'super_title' => 'More Rewards',
                'title'       => 'Others',
                'subtitle'    => 'Exclusive benefits and limited-time offers',
                'is_active'   => true,
                'offers' => [
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://example.com/media/ucbtravel-logo.png',
                        'super_title'  => 'Fly More, Save More',
                        'title'        => '5% Discount on Flight Bookings',
                        'subtitle'     => 'Applicable on all international destinations',
                        'description'  => 'Get 5% off airline bookings made through UCB Travel Partners.',
                        'address'      => 'UCB Travel Office, Gulshan Avenue, Dhaka',
                        'eligibility'  => 'Valid for Platinum Card members only.',
                        'validity'     => 'Valid until March 31, 2026',
                        'is_active'    => true,
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = OfferCategory::create([
                'media_type'  => $categoryData['media_type'],
                'media_path'  => $categoryData['media_path'],
                'super_title' => $categoryData['super_title'],
                'title'       => $categoryData['title'],
                'subtitle'    => $categoryData['subtitle'],
                'is_active'   => $categoryData['is_active'],
            ]);

            foreach ($categoryData['offers'] as $offerData) {
                Offer::create([
                    'offer_category_id' => $category->id,
                    'media_type'        => $offerData['media_type'],
                    'media_path'        => $offerData['media_path'],
                    'super_title'       => $offerData['super_title'],
                    'title'             => $offerData['title'],
                    'subtitle'          => $offerData['subtitle'],
                    'description'       => $offerData['description'],
                    'address'           => $offerData['address'],
                    'eligibility'       => $offerData['eligibility'],
                    'validity'          => $offerData['validity'],
                    'is_active'         => $offerData['is_active'],
                ]);
            }
        }
    }
}