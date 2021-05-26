<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{

    use HasFactory, InteractsWithMedia ;

    protected $table = 'product_categories';

    protected $fillable = [
        'name',
        'description',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    // public function products() {
    //     $this->hasMany(Product::class);
    // }
    public function products() {
        return $this->belongsToMany(Product::class)->withTimestamps();
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
