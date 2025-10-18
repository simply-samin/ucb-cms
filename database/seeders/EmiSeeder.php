<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emi;
use App\Models\EmiCategory;

class EmiSeeder extends Seeder
{
    public function run(): void
    {
        // Avoid duplicate seeding
        if (EmiCategory::count() > 0 || Emi::count() > 0) {
            return;
        }

        $categories = [
            [
                'media_type'  => 'image',
                'media_path'  => 'https://ucbcdn.example.com/media/emi-electronics-category.jpg',
                'super_title' => 'Tech Upgrades Made Easy',
                'title'       => 'Electronics',
                'subtitle'    => 'Upgrade to the latest gadgets with easy installments',
                'is_active'   => true,
                'emis' => [
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://ucbcdn.example.com/media/samsung-tv.jpg',
                        'super_title'  => 'Samsung 4K Smart TV',
                        'title'        => '0% Interest for 24 Months',
                        'subtitle'     => 'Exclusive for UCB Credit Cardholders',
                        'description'  => '<p>Upgrade your home entertainment experience with a brand-new Samsung 4K Smart TV on easy installments. Enjoy flexible 0% interest EMIs for up to 24 months.</p>',
                        'address'      => '<p>Available at Samsung Brand Stores and Authorized Retailers nationwide.</p>',
                        'eligibility'  => '<p>Valid for all active UCB credit cardholders.</p>',
                        'validity'     => 'Valid until December 31, 2025',
                        'is_active'    => true,
                    ],
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://ucbcdn.example.com/media/apple-iphone15.jpg',
                        'super_title'  => 'Apple iPhone 15 Series',
                        'title'        => 'Enjoy 0% EMI up to 18 Months',
                        'subtitle'     => 'Upgrade to the latest iPhone with UCB Easy EMI',
                        'description'  => '<p>Bring home the latest iPhone 15 with zero down payment and flexible tenure options through UCB Easy EMI.</p>',
                        'address'      => '<p>Available at Apple Authorized Resellers.</p>',
                        'eligibility'  => '<p>Applicable for platinum and gold UCB credit cardholders.</p>',
                        'validity'     => 'Offer valid till March 31, 2026',
                        'is_active'    => true,
                    ],
                ],
            ],
            [
                'media_type'  => 'image',
                'media_path'  => 'https://ucbcdn.example.com/media/emi-travel-category.jpg',
                'super_title' => 'Travel Smarter, Pay Later',
                'title'       => 'Travel',
                'subtitle'    => 'Plan your next getaway with convenient installment options',
                'is_active'   => true,
                'emis' => [
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://ucbcdn.example.com/media/airline-emi.jpg',
                        'super_title'  => 'International Flights',
                        'title'        => 'Easy 6-Month EMI on Airline Tickets',
                        'subtitle'     => 'Book now – pay over time with UCB EMI',
                        'description'  => '<p>Explore the world without financial stress. Enjoy interest-free EMIs for 6 months on flight bookings made via UCB Travel Partners.</p>',
                        'address'      => '<p>UCB Travel Desk, Level 4, UCB Tower, Gulshan Avenue, Dhaka.</p>',
                        'eligibility'  => '<p>Available for all UCB credit cardholders.</p>',
                        'validity'     => 'Valid until January 31, 2026',
                        'is_active'    => true,
                    ],
                ],
            ],
            [
                'media_type'  => 'image',
                'media_path'  => 'https://ucbcdn.example.com/media/emi-home-category.jpg',
                'super_title' => 'Comfort You Deserve',
                'title'       => 'Home Appliances',
                'subtitle'    => 'Furnish your home with interest-free installment plans',
                'is_active'   => true,
                'emis' => [
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://ucbcdn.example.com/media/lg-refrigerator.jpg',
                        'super_title'  => 'LG Smart Refrigerator',
                        'title'        => '12-Month Easy EMI',
                        'subtitle'     => 'Keep your kitchen cool and payments easier',
                        'description'  => '<p>Enjoy convenient 12-month EMI with 0% interest on all LG Smart Refrigerators. Bringing freshness and finance together.</p>',
                        'address'      => '<p>Available at LG authorized showrooms across Bangladesh.</p>',
                        'eligibility'  => '<p>UCB credit cardholders only. Minimum purchase BDT 50,000.</p>',
                        'validity'     => 'Offer valid until December 2025.',
                        'is_active'    => true,
                    ],
                ],
            ],
            [
                'media_type'  => 'image',
                'media_path'  => 'https://ucbcdn.example.com/media/emi-lifestyle-category.jpg',
                'super_title' => 'Lifestyle & Wellness',
                'title'       => 'Fitness & Health',
                'subtitle'    => 'Stay fit – Pay smart with UCB EMI plans',
                'is_active'   => true,
                'emis' => [
                    [
                        'media_type'   => 'image',
                        'media_path'   => 'https://ucbcdn.example.com/media/fitness-equipment.jpg',
                        'super_title'  => 'Fitness Equipment',
                        'title'        => '0% EMI up to 12 Months',
                        'subtitle'     => 'Shape your goals with no financial worry',
                        'description'  => '<p>Avail zero-interest EMI on treadmills, exercise bikes, and more from top fitness brands. Make your health routine more rewarding.</p>',
                        'address'      => '<p>Partner Outlets: Alpha Fitness, Olympus Sports.</p>',
                        'eligibility'  => '<p>Offer open to all UCB credit cardholders.</p>',
                        'validity'     => 'Valid until June 30, 2026',
                        'is_active'    => true,
                    ],
                ],
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = EmiCategory::create([
                'media_type'  => $categoryData['media_type'],
                'media_path'  => $categoryData['media_path'],
                'super_title' => $categoryData['super_title'],
                'title'       => $categoryData['title'],
                'subtitle'    => $categoryData['subtitle'],
                'is_active'   => $categoryData['is_active'],
            ]);

            foreach ($categoryData['emis'] as $emiData) {
                Emi::create([
                    'emi_category_id' => $category->id,
                    'media_type'      => $emiData['media_type'],
                    'media_path'      => $emiData['media_path'],
                    'super_title'     => $emiData['super_title'],
                    'title'           => $emiData['title'],
                    'subtitle'        => $emiData['subtitle'],
                    'description'     => $emiData['description'],
                    'address'         => $emiData['address'],
                    'eligibility'     => $emiData['eligibility'],
                    'validity'        => $emiData['validity'],
                    'is_active'       => $emiData['is_active'],
                ]);
            }
        }
    }
}