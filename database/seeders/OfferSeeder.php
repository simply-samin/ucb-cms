<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OfferCategory;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        // Only seed if empty
        if (OfferCategory::count() > 0 || Offer::count() > 0) {
            return;
        }

        $categories = [
            [
                'title' => 'Dinning',
                'subtitle' => 'Savor exclusive discounts at top restaurants',
                'offers' => [
                    [
                        'brand_name'   => 'Le Bistro',
                        'brand_image'  => 'https://example.com/media/le-bistro-logo.png',
                        'offer_amount' => '20%',
                        'title'        => '20% Off on À La Carte',
                        'subtitle'     => 'Available on all dinner reservations',
                        'description'  => 'Enjoy 20% off on à la carte menu items when you book a table through our app.',
                        'eligibility'  => 'Applicable for all members. Valid for dine-in only.',
                        'validity'     => 'Valid until December 31, 2025',
                    ],
                    [
                        'brand_name'   => 'Umami Sushi',
                        'brand_image'  => 'https://example.com/media/umami-logo.png',
                        'offer_amount' => 'Buy 1 Get 1',
                        'title'        => 'Sushi Platter',
                        'subtitle'     => 'Exclusive BOGO on Signature Platters',
                        'description'  => 'Buy any sushi platter and get another of the same value free.',
                        'eligibility'  => 'Only available for Gold Tier members. Dine-in only.',
                        'validity'     => 'Valid November 1, 2025 – January 15, 2026',
                    ],
                    [
                        'brand_name'   => 'Bean & Brew',
                        'brand_image'  => 'https://example.com/media/beanbrew-logo.png',
                        'offer_amount' => '15%',
                        'title'        => 'Flat 15% Off',
                        'subtitle'     => 'On any coffee and dessert combo',
                        'description'  => 'Enjoy a flat 15% discount on any coffee and dessert combo at Bean & Brew.',
                        'eligibility'  => 'Valid for all members. Not applicable on takeaways.',
                        'validity'     => 'Offer valid till December 31, 2025',
                    ],
                ],
            ],
            [
                'title' => 'Fashion',
                'subtitle' => 'Style with exclusive discounts on premium brands',
                'offers' => [
                    [
                        'brand_name'   => 'Urban Vogue',
                        'brand_image'  => 'https://example.com/media/urbanvogue-logo.png',
                        'offer_amount' => '25%',
                        'title'        => '25% Off All Summer Collection',
                        'subtitle'     => 'Redeem in-store and online',
                        'description'  => 'Get 25% off all apparel and accessories from our summer line.',
                        'eligibility'  => 'Applicable to all cardholders. Valid for in-store and online purchases.',
                        'validity'     => 'Valid till September 30, 2025',
                    ],
                ],
            ],
            [
                'title' => 'Groceries',
                'subtitle' => 'Save more on your everyday essentials',
                'offers' => [
                    [
                        'brand_name'   => 'DailyMart',
                        'brand_image'  => 'https://example.com/media/dailymart-logo.png',
                        'offer_amount' => '10%',
                        'title'        => '10% Cashback on Weekend Purchases',
                        'subtitle'     => 'Applicable every Friday & Saturday',
                        'description'  => 'Enjoy 10% cashback on your total grocery bill every weekend at DailyMart.',
                        'eligibility'  => 'Minimum spend BDT 2,000 required. Valid for all members.',
                        'validity'     => 'Valid until December 31, 2025',
                    ],
                ],
            ],
            [
                'title' => 'Others',
                'subtitle' => 'Exclusive benefits and limited-time offers',
                'offers' => [
                    [
                        'brand_name'   => 'UCB Travel',
                        'brand_image'  => 'https://example.com/media/ucbtravel-logo.png',
                        'offer_amount' => '5%',
                        'title'        => '5% Discount on Flight Bookings',
                        'subtitle'     => 'Applicable on all international destinations',
                        'description'  => 'Get 5% off airline bookings made through UCB Travel Partners.',
                        'eligibility'  => 'Valid for Platinum Card members only.',
                        'validity'     => 'Valid until March 31, 2026',
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = OfferCategory::create([
                'title'    => $categoryData['title'],
                'subtitle' => $categoryData['subtitle'],
            ]);

            foreach ($categoryData['offers'] as $offerData) {
                Offer::create([
                    'offer_category_id' => $category->id,
                    'brand_name'        => $offerData['brand_name'],
                    'brand_image'       => $offerData['brand_image'],
                    'offer_amount'      => $offerData['offer_amount'],
                    'title'             => $offerData['title'],
                    'subtitle'          => $offerData['subtitle'],
                    'description'       => $offerData['description'],
                    'eligibility'       => $offerData['eligibility'],
                    'validity'          => $offerData['validity'],
                ]);
            }
        }
    }
}