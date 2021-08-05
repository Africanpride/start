<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;

class Product extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia ;

    protected $table = 'products';

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
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function author() {
        return $this->belongsTo(User::class);
    }

    public function getPriceSymbolAttribute (): string {
        return 'GHS';
    }

    public function specifications() {
        $this->hasMany(ProductSpecifications::class);
    }

    public function categories() {
        return $this->belongsToMany(ProductCategory::class)->withTimestamps();
    }

    public function registerMediaCollections(): void    {

        $this->addMediaCollection('featured')
            // ->singleFile()
            ->useFallbackUrl('/backend/assets/img/product/pg1.png')
            ->useFallbackPath(public_path('/backend/assets/img/product/pg1.png'));

            $this->addMediaCollection('category_image')
            // ->withResponsiveImages()
            ->singleFile();

            $this->addMediaConversion('banner')
            ->width(1024)
            ->height(300)
            ->sharpen(10);

            $this->addMediaConversion('Product')
            ->width(600)
            ->height(500)
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
