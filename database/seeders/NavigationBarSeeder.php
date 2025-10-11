<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NavigationBar;

class NavigationBarSeeder extends Seeder
{
    public function run(): void
    {
        NavigationBar::firstOrCreate([], [
            'brand_name' => 'UCB',
            'menu_items' => [
                ['label' => 'Home', 'link' => '/'],
                ['label' => 'Cards', 'link' => '/cards'],
                ['label' => 'Offers', 'link' => '/offers'],
            ],
            'cta_text' => 'Contact Us',
            'cta_link' => '/contact',
        ]);
    }
}