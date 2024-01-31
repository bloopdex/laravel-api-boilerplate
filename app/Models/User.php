<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 *
 * @property int $user_id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $school_id
 * @property bool|null $is_archived
 *
 * @property School|null $school
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class User extends Authenticatable implements JWTSubject, HasMedia
{
    use InteractsWithMedia;

	protected $table = 'Users';
	protected $primaryKey = 'user_id';
	public $timestamps = false;

	protected $casts = [
		'school_id' => 'int',
		'is_archived' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'username',
		'password',
		'first_name',
		'last_name',
		'email',
		'phone',
		'school_id',
		'is_archived'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'User_Roles', 'user_id', 'role_id');
    }

    public function permissions()
    {
        return $this->hasManyThrough(Permission::class, Role::class, 'role_id', 'permission_id');
    }

    public function hasRole($role)
    {
        return $this->roles()->where('role_name', $role)->exists();
    }

    public function hasPermission($permission)
    {
        return $this->permissions()->where('permission_name', $permission)->exists();
    }

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
