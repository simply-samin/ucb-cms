<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        Footer::firstOrCreate([], [
            'logo' => 'images/footer-logo.png',
            'description' => '<p>UCB provides premium banking experiences across Bangladesh.</p>',
            'head_office_address' => 'Plot CWS (A)-1, Road No. 34, Gulshan Avenue, Dhaka 1212, Bangladesh',
            'support_email' => 'support@ucb.com',
            'hotline' => '+880 9612 112233',

            'links' => [
                ['label' => 'About Us', 'link' => '/about', 'sort' => 1],
                ['label' => 'Careers', 'link' => '/careers', 'sort' => 2],
                ['label' => 'Contact Us', 'link' => '/contact', 'sort' => 3],
            ],

            'social_links' => [
                ['platform' => 'Facebook', 'link' => 'https://facebook.com/ucb', 'icon' => 'facebook', 'sort' => 1],
                ['platform' => 'LinkedIn', 'link' => 'https://linkedin.com/company/ucb', 'icon' => 'linkedin', 'sort' => 2],
                ['platform' => 'Instagram', 'link' => 'https://instagram.com/ucb', 'icon' => 'instagram', 'sort' => 3],
                ['platform' => 'YouTube', 'link' => 'https://youtube.com/@ucb', 'icon' => 'youtube', 'sort' => 4],
            ],

            'mobile_apps' => [
                ['platform' => 'App Store', 'link' => 'https://apps.apple.com/app/ucb', 'icon' => 'images/appstore.png', 'sort' => 1],
                ['platform' => 'Google Play', 'link' => 'https://play.google.com/store/apps/details?id=ucb', 'icon' => 'images/playstore.png', 'sort' => 2],
            ],

            'copyright_text' => '© 2025 UCB. All rights reserved.',
        ]);
    }
}