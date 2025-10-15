<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum NavigationGroup implements HasLabel
{   
    case SiteStructure;

    public function getLabel(): string
    {
        return match ($this) {
            self::SiteStructure => 'Site Structure',
        };
    }
}

