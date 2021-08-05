<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Business extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $table = 'business';

    // protected $guarded = [];

    protected $fillable = [
        'business_name', 'business_description', 'business_email', 'business_number', 'seo_keywords', 'main'
    ];

    // protected $casts = [
    //     'seo_keywords' => 'array'
    // ];

    public function registerMediaCollections(): void    {

        $this->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl('/backend/assets/img/avatar/avatar.jpg')
            ->useFallbackPath(public_path('/backend/assets/img/avatar/avatar.jpg'));

            $this->addMediaCollection('logo')
            ->useFallbackUrl('/backend/assets/img/mobile-logo.png')
            ->useFallbackPath(public_path('backend/assets/img/mobile-logo.png'))
            ->singleFile();
            // ->withResponsiveImages()

        $this->addMediaConversion('mobile-logo')
            ->width(90)
            ->height(90)
            ->sharpen(10);

        $this->addMediaConversion('square')
            ->width(212)
            ->height(212)
            ->sharpen(10);

        $this->addMediaConversion('old-picture')
            ->sepia()
            ->border(10, 'black', Manipulations::BORDER_OVERLAY);
  }
}
