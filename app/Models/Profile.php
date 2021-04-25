<?php

namespace App\Models;

use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, Uuids;

    protected $fillable = [
    'bio', 'address1', 'address2', 'post_code',
    'country', 'phone','banner', 'avatar', 'linkedin','twitter',
    'facebook','github','user_id'];

    public $incrementing = false;


    // profile->user
    public function user() {
        return $this->belongsTo(User::class);
    }
}
