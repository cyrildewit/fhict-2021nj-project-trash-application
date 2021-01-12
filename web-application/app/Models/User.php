<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
class User extends Authenticatable implements JWTSubject, HasMedia
{
    use HasFactory,
        Notifiable,
        InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar(string $conversion = 'small')
    {
        $avatar = $this->getFirstMediaUrl('avatar', $conversion);

        if ($avatar === null) {
            $avatar = Avatar::create($this->name)->toBase64();
        }

        return $avatar;
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('tiny')
              ->width(120)
              ->height(120)
              ->performOnCollections('avatar');

        $this->addMediaConversion('small')
              ->width(210)
              ->height(210)
              ->performOnCollections('avatar');

        $this->addMediaConversion('medium')
              ->width(420)
              ->height(420)
              ->performOnCollections('avatar');

        $this->addMediaConversion('large')
              ->width(800)
              ->height(00)
              ->performOnCollections('avatar');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
