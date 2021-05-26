<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $table = 'service';

    protected $fillable = [
        'name',
        'description'
    ];

    protected $dates = [
        'deleted_at'
    ];

    // public function characteristics() {
    //     $this->hasMany(ServiceSpecs::class);
    // }

    public function registerMediaCollections(): void    {

        // $this->addMediaCollection('avatar')
        //     ->singleFile()
        //     ->useFallbackUrl('/backend/assets/img/avatar/avatar.jpg')
        //     ->useFallbackPath(public_path('/backend/assets/img/avatar/avatar.jpg'));

        $this->addMediaCollection('service_image')
            // ->withResponsiveImages()
            ->singleFile();

        $this->addMediaConversion('banner')
            ->width(1024)
            ->height(300)
            ->sharpen(10);

        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
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
