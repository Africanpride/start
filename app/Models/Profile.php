<?php

namespace App\Models;

use App\Models\User;
use Emadadly\LaravelUuid\Uuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory, Uuids;

    protected $table = 'profile';

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
