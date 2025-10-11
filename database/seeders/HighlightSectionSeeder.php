<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HighlightSection;

class HighlightSectionSeeder extends Seeder
{
    public function run(): void
    {
        HighlightSection::firstOrCreate([], [
            'tagline_text' => 'Not Just A Swipe',
            'main_heading' => 'A Gateway to Lasting Memories',
            'primary_cta_text' => 'Explore Cards',
            'primary_cta_link' => '#',
            'secondary_cta_text' => 'Dial Us',
            'secondary_cta_link' => '#',
        ]);
    }
}