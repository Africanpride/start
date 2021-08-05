<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use App\Models\Article_Image;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model implements HasMedia
{

    use HasFactory, SoftDeletes, InteractsWithMedia;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'articles';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'title',
                  'slug',
                  'content',
                  'notes',
                  'image',
                  'active',
                  'featured',
                  'user_id',
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
               'deleted_at'
           ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    /**
     * Get the creator for this model.
     *
     * @return App\User
     */
    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function author() {
        return $this->belongsTo(User::class);
    }

    // public function images() {
    //     return $this->hasMany(Article_Image::class);
    // }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function registerMediaCollections(): void    {

            $this->addMediaCollection('featured')
                // ->withResponsiveImages()
                ->useFallbackUrl('/backend/assets/img/product/pg1.png')
                ->useFallbackPath(public_path('/backend/assets/img/product/pg1.png'))
                ->singleFile();

            $this->addMediaConversion('thumb')
                ->width(200)
                ->height(200)
                ->sharpen(10);

            $this->addMediaConversion('square')
                ->width(212)
                ->height(212)
                ->sharpen(10);

            $this->addMediaConversion('backend')
                ->width(230)
                ->height(192)
                ->sharpen(10);

            $this->addMediaConversion('old-picture')
                ->sepia()
                ->border(10, 'black', Manipulations::BORDER_OVERLAY);
      }


}
