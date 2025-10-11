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
        HeroSection::firstOrCreate([], [
            'title'            => 'Your Campaign',
            'subtitle'         => 'Text will show here',
            'background_type'  => 'image',
            'background_media' => null,
            'cta_label'        => 'Learn More',
            'cta_link'         => '#',
            'text_alignment'   => 'center',
        ]);
    }
}