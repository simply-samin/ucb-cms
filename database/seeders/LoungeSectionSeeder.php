<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoungeSection;

class LoungeSectionSeeder extends Seeder
{
    public function run(): void
    {
        LoungeSection::firstOrCreate(
            [
                'title' => 'Welcome to The Lounge',
            ],
            [
                'media_type'  => 'image',
                'media_path'  => 'uploads/lounge/banner.jpg',
                'super_title' => 'Relax. Refresh. Recharge.',
                'title'       => 'Welcome to The Lounge',
                'subtitle'    => 'Your exclusive space to unwind, connect, and enjoy elevated experiences.',
                'cta_label'   => 'Explore Benefits',
                'cta_link'    => '/lounge',
            ]
        );
    }
}