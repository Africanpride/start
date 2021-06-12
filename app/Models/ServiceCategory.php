<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceCategory extends Model implements HasMedia
{

    use HasFactory, InteractsWithMedia ;

    public $table = 'scategories';

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    // public function Services() {
    //     $this->hasMany(Service::class);
    // }
    public function services() {
        return $this->belongsToMany(Service::class, 'scategory_service', 'scategory_id', 'service_id')
                    ->withTimestamps();
    }

    public function registerMediaCollections(): void    {

        $this->addMediaCollection('avatar')
            ->singleFile()
            ->useFallbackUrl('/backend/assets/img/avatar/avatar.jpg')
            ->useFallbackPath(public_path('/backend/assets/img/avatar/avatar.jpg'));

        $this->addMediaCollection('category_image')
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
