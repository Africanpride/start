<?php

namespace App\Models;

use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    public $table = 'services';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'comment',
        'user_id',
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories() {
        return $this->belongsToMany(ServiceCategory::class,  'scategory_service',  'service_id', 'scategory_id')
                    ->withTimestamps();
    }

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
