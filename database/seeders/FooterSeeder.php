<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        Footer::firstOrCreate([], [
            'about_text' => '<p>UCB provides premium banking experiences across Bangladesh.</p>',
            'links' => [
                ['label' => 'About Us', 'link' => '/about'],
                ['label' => 'Careers', 'link' => '/careers'],
            ],
            'social_links' => [
                ['platform' => 'Facebook', 'link' => 'https://facebook.com/ucb', 'icon' => 'fa-brands fa-facebook'],
                ['platform' => 'LinkedIn', 'link' => 'https://linkedin.com/company/ucb', 'icon' => 'fa-brands fa-linkedin'],
            ],
            'copyright_text' => '© 2025 UCB. All rights reserved.',
        ]);
    }
}