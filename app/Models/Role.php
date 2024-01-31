<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property int $role_id
 * @property string|null $arabic_name
 * @property string|null $english_name
 * @property string|null $note
 * @property int|null $school_id
 *
 * @property School|null $school
 * @property Collection|Permission[] $permissions
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Role extends Model
{
	protected $table = 'Roles';
	protected $primaryKey = 'role_id';
	public $timestamps = false;

	protected $casts = [
		'school_id' => 'int'
	];

	protected $fillable = [
		'arabic_name',
		'english_name',
		'note',
		'school_id'
	];

	public function school()
	{
		return $this->belongsTo(School::class, 'school_id');
	}

	public function permissions()
	{
		return $this->belongsToMany(Permission::class, 'Role_Permissions');
	}

	public function users()
	{
        return $this->belongsToMany(User::class, 'User_Roles', 'role_id', 'user_id');
	}
}
