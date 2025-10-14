<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HeroContent extends Model
{
    use HasFactory;

   /**
     * The attributes that aren't mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    public function heroSection(): BelongsTo
    {
        return $this->belongsTo(HeroSection::class);
    }

    // protected static function booted(): void
    // {
    //     static::saving(function (HeroContent $content) {
    //         if (
    //             $content->isDirty('media_type') &&
    //             $content->getOriginal('media_type') === 'image' &&
    //             filled($content->getOriginal('media_path'))
    //         ) {
    //             Storage::disk('public')->delete($content->getOriginal('media_path'));
    //         }
    //     });
    // }

}