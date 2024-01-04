<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $password
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class User extends Authenticatable implements JWTSubject, HasMedia
{
    use InteractsWithMedia;
    protected $table = 'users';

    protected $hidden = [
        'password'
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Registers media collections for the model.
     *
     * This method sets up the media collections used by the model. Specifically,
     * it creates a 'users-image' collection intended for storing user images.
     * The collection is configured to store only a single file, meaning each new
     * file upload will replace the previous one. Additionally, fallbacks are
     * defined for both the URL and the file path, pointing to a default image,
     * which is used when no media item has been added to the collection.
     *
     * @return void
     */
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('users-image')
            ->singleFile()
            ->useFallbackUrl('/images/user.png')
            ->useFallbackPath(public_path('/images/user.png'))
            ->registerMediaConversions(function () {
                $this->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    }

    /**
     * Get the URL of the user's image.
     *
     * This method returns the URL of the media item associated with the
     * user. If no media item is attached, it returns the URL of a
     * fallback image as defined in the registerMediaCollections method.
     *
     * @return string
     */
    public function getMediaUrl(): string
    {
        return url($this->getFirstMediaUrl('users-image'));
    }

}
